<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\BankAccount;
use iteos\Models\BankStatement;
use iteos\Models\ChartOfAccount;
use iteos\Models\AccountStatement;
use iteos\Models\JournalEntry;
use iteos\Models\AssetCategory;
use iteos\Models\AssetManagement;
use iteos\Models\AssetDepreciation;
use Maatwebsite\Excel\Facades\Excel;
use iteos\Imports\BankTransactionImport;
use DB;
use Ramsey\Uuid\Uuid;

class AccountingController extends Controller
{
    public function index()
    {
    	return view('apps.pages.accountingHome');
    }

    public function bankIndex()
    {
    	$banks = BankAccount::orderBy('bank_name','ASC')->get();
        $balances = BankStatement::latest('id')->first();
        $data = DB::table('bank_statements')->select('transaction_date','balance')->get();
        $array[] = ['transaction_date','balance'];
        foreach($data as $key=>$value) {
            $array[++$key] = [$value->transaction_date,(int)$value->balance];
        }

    	return view('apps.pages.bankStatementNew',compact('banks','balances'))->with('data',json_encode($array));
    }

    public function bankStatementIndex()
    {
        $data = BankStatement::orderBy('updated_at','DESC')->get();

        return view('apps.pages.statementIndex',compact('data'));
    }

    public function bankPeriod(Request $request)
    {
    	$data = BankStatement::create([
    		'bank_id' => $request->input('bank_id'),
    		'statement_period' => $request->input('period'),
    	]);

    	return redirect()->route('bank.index');
    }

    public function bankStatement($id)
    {
    	$data = BankAccount::find($id);

    	return view('apps.input.bankStatement',compact('data'))->renderSections()['content'];
    }

    public function bankStatementImport(Request $request,$id) 
    { 
    	$request->validate([
            'statement' => 'required|file|mimes:xlsx,xls,XLSX,XLS'
        ]);
 
        $input = $request->all();
        
        $data = Excel::toArray(new BankTransactionImport, $request->file('statement'))[0];
        
        foreach($data as $value) {
            $result = BankStatement::create([
                'bank_account_id' => $request->input('account_id'),
                'transaction_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['date']),
                'payee' => $value['payee'],
                'description' => $value['description'],
                'type' => $value['type'],
                'amount' => $value['amount'],
                'balance' => $value['balance'],
                'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
            ]);
        }
        
        $log = 'Bank Statement Successfully Import';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Bank Statement Successfully Import',
            'alert-type' => 'success'
        );
        return redirect()->route('statToAcc.index')->with($notification);
    }

    public function statementToAccount()
    {
        $data = BankStatement::where('status_id','e6cb9165-131e-406c-81c8-c2ba9a2c567e')->orderBy('created_at','ASC')->get();

        return view('apps.input.statementToAccount',compact('data'));
    }

    public function findTransactionByDate($id)
    {
        $filter = BankStatement::find($id);
        $data = AccountStatement::where('transaction_date',$filter->transaction_date)->where('status_id','e6cb9165-131e-406c-81c8-c2ba9a2c567e')->get();
        
        return view('apps.input.bankToAccount',compact('data','filter'))->renderSections()['content'];
    }

    public function bankStatementMatch(Request $request,$id)
    {
        $input = $request->all();
        $data = BankStatement::where('id',$request->input('statement_id'))->first();
        $source = AccountStatement::where('id',$request->input('account_id'))->first();
        $changes = $data->update([
            'reference_no' => $source->reference_no,
            'payee' => $source->payee,
            'status_id' => 'f6e41f5d-0f6e-4eca-a141-b6c7ce34cae6'
        ]);
        
        $source->update([
            'statement_id' => $data->id,
            'status_id' => 'f6e41f5d-0f6e-4eca-a141-b6c7ce34cae6'
        ]);
        $sources = AccountStatement::where('id',$request->input('account_id'))->first();
        if(($sources->trans_type) == 'Debit') {
            $entries = AccountStatement::create([
                'trans_group' => $sources->trans_group,
                'transaction_date' => $sources->transaction_date,
                'reference_no' => $sources->reference_no,
                'bank_id' => $data->bank_account_id,
                'payee' => $sources->payee,
                'item' => $sources->item,
                'description' => $sources->description,
                'amount' => $sources->amount,
                'trans_type' => 'Credit',
                'status_id' => $sources->status_id,
                'created_by' => auth()->user()->employee_id,
            ]);
        } else {
            $entries = AccountStatement::create([
                'trans_group' => $sources->trans_group,
                'transaction_date' => $sources->transaction_date,
                'reference_no' => $sources->reference_no,
                'bank_id' => $data->bank_account_id,
                'payee' => $sources->payee,
                'item' => $sources->item,
                'description' => $sources->description,
                'amount' => $sources->amount,
                'trans_type' => 'Debit',
                'status_id' => $sources->status_id,
                'created_by' => auth()->user()->employee_id,
            ]);
        }
        
        
        return redirect()->back();

    }

    public function accountIndex() 
    {
    	$data = AccountStatement::where('bank_id',NULL)->orderBy('updated_at','ASC')->paginate(10);

    	return view('apps.pages.accountIndex',compact('data'));
    }

    public function statementPeriod(Request $request)
    {
    	$data = AccountStatement::create([
    		'account_period' => $request->input('period'),
    		'created_by' => auth()->user()->employee_id,
    	]);

    	return redirect()->route('account.index');
    }

    public function AccountTransaction($id)
    {
    	$data  = AccountStatement::find($id);

    	return view('apps.pages.AccountTransaction',compact('data'));
    }

    public function AccountTransactionShow($id)
    {
        $data = AccountStatement::find($id);
        
        return view('apps.show.accountTransaction',compact('data'));
    }

    public function spendCreate()
    {
        $coas = ChartOfAccount::where('account_category','2')
                                ->orWhere('account_category','4')
                                ->orderBy('account_id','ASC')
                                ->pluck('account_name','id')
                                ->toArray();

    	return view('apps.input.transactionSpend',compact('coas'));
    }

    public function spendStore(Request $request)
    {
        $input = $request->all();
        $lastOrder = AccountStatement::count();
        $items = $request->item;
        $descriptions = $request->description;
        $quantities = $request->quantity;
        $prices = $request->unit_price;
        $accounts = $request->account;
        $taxes = $request->tax;
        $files = $request->file;
        foreach($items as $index=>$item) {
            $data = AccountStatement::create([
                'transaction_date' => $request->input('transaction_date'),
                'reference_no' => ''.str_pad($lastOrder + 1, 4, "0", STR_PAD_LEFT).'',
                'trans_group' => Uuid::uuid4()->getHex(),
                'account_id' => $accounts[$index],
                'payee' => $request->input('payee'),
                'item' => $item,
                'description' => $descriptions[$index],
                'amount' => $prices[$index],
                'trans_type' => 'Debit',
                'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
                'created_by' => auth()->user()->employee_id,
            ]);
        }

        return redirect()->route('bank.index');
    }

    public function receiveCreate()
    {
        $coas = ChartOfAccount::where('account_category','2')
                                ->orWhere('account_category','3')
                                ->orderBy('account_id','ASC')
                                ->pluck('account_name','id')
                                ->toArray();

        return view('apps.input.transactionReceive',compact('coas'));
    }

    public function receiveStore(Request $request)
    {
        $input = $request->all();
        $lastOrder = AccountStatement::count();
        $items = $request->item;
        $descriptions = $request->description;
        $quantities = $request->quantity;
        $prices = $request->unit_price;
        $accounts = $request->account;
        $taxes = $request->tax;
        $files = $request->file;
        foreach($items as $index=>$item) {
            $data = AccountStatement::create([
                'transaction_date' => $request->input('transaction_date'),
                'reference_no' => ''.str_pad($lastOrder + 1, 4, "0", STR_PAD_LEFT).'',
                'trans_group' => Uuid::uuid4()->getHex(),
                'account_id' => $accounts[$index],
                'payee' => $request->input('payee'),
                'item' => $item,
                'description' => $descriptions[$index],
                'amount' => $prices[$index],
                'trans_type' => 'Credit',
                'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
                'created_by' => auth()->user()->employee_id,
            ]);
        }

        return redirect()->route('bank.index');
    }

    public function assetManagementIndex()
    {
        $data = AssetManagement::orderBy('name','ASC')->get();
        $categories = AssetCategory::orderBy('category_name','ASC')->pluck('category_name','id')->toArray();

        return view('apps.pages.assetManagement',compact('data','categories'));
    }

    public function assetManagementStore(Request $request)
    {
        $this->validate($request, [
            'asset_code' => 'required',
            'asset_name' => 'required',
            'category_name' => 'required',
            'purchase_date' => 'required',
            'purchase_price' => 'required',
            'estimate_time' => 'required',
            'estimate_value' => 'required',
        ]);

        $data = AssetManagement::create([
            'asset_code' => $request->input('asset_code'),
            'name' => $request->input('asset_name'),
            'category_name' => $request->input('category_name'),
            'purchase_date' => $request->input('purchase_date'),
            'purchase_price' => $request->input('purchase_price'),
            'estimate_time' => $request->input('estimate_time'),
            'estimate_depreciate_value' => $request->input('estimate_value'),
            'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
        ]);

        $journal = AccountStatement::create([
            'trans_group' => Uuid::uuid4()->getHex(),
            'transaction_date' => $data->purchase_date,
            'reference_no' => '',
            'account_id' => $data->Categories->chart_of_account_id,
            'payee' => 'Tes',
            'item' => $data->name,
            'description' => $data->name,
            'amount' => $data->purchase_price,
            'trans_type' => 'Debit',
            'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
            'created_by' => auth()->user()->employee_id,
        ]);

        return redirect()->route('asset.index');
    }

}

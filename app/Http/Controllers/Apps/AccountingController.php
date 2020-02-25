<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\BankAccount;
use iteos\Models\BankStatement;
use iteos\Models\ChartOfAccount;
use iteos\Models\AccountStatement;
use Maatwebsite\Excel\Facades\Excel;
use iteos\Imports\BankTransactionImport;
use DB;

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
        dd($data);
        return view('apps.input.bankToAccount',compact('data','filter'))->renderSections()['content'];
    }

    public function bankStatementMatch(Request $request,$id)
    {
        $input = $request->all();
        $data = BankStatement::where('id',$request->input('statement_id'))->first();
        $source = AccountStatement::where('id',$request->input('account_id'))->first();
        $changes = $data->update([
            'account_name' => $source->account_name,
            'payee' => $source->payee,
            'status_id' => 'f6e41f5d-0f6e-4eca-a141-b6c7ce34cae6'
        ]);
        $source->update([
            'status_id' => 'f6e41f5d-0f6e-4eca-a141-b6c7ce34cae6'
        ]);

        return redirect()->back();

    }

    public function accountIndex() 
    {
    	$data = AccountStatement::orderBy('updated_at','DESC')->get();

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

    public function spendCreate()
    {
        $coas = ChartOfAccount::where('account_category','2')
                                ->orWhere('account_category','4')
                                ->orderBy('account_id','ASC')
                                ->pluck('account_name','account_id')
                                ->toArray();

    	return view('apps.input.transactionSpend',compact('coas'));
    }

    public function spendStore(Request $request)
    {
        $input = $request->all();
        
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
                'account_name' => $accounts[$index],
                'payee' => $request->input('payee'),
                'item' => $item,
                'description' => $descriptions[$index],
                'amount' => $prices[$index],
                'type' => 'Debit',
                'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
                'created_by' => auth()->user()->employee_id,
            ]);
        }

        return redirect()->back();
    }

    public function receiveCreate()
    {
        $coas = ChartOfAccount::where('account_category','2')
                                ->orWhere('account_category','3')
                                ->orderBy('account_id','ASC')
                                ->pluck('account_name','account_id')
                                ->toArray();

        return view('apps.input.transactionReceive',compact('coas'));
    }

    public function receiveStore(Request $request)
    {
        $input = $request->all();
        
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
                'account_name' => $accounts[$index],
                'payee' => $request->input('payee'),
                'item' => $item,
                'description' => $descriptions[$index],
                'amount' => $prices[$index],
                'type' => 'Credit',
                'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
                'created_by' => auth()->user()->employee_id,
            ]);
        }

        return redirect()->back();
    }
}

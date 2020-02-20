<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\BankAccount;
use iteos\Models\BankStatement;
use iteos\Models\ChartOfAccount;
use iteos\Models\AccountStatement;
use iteos\Models\AccountTransaction;
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

    	return view('apps.pages.bankStatementNew',compact('banks'));
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
                'account_id' => $id,
                'transaction_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['date']),
                'reference' => $value['reference'],
                'payee' => $value['payee'],
                'description' => $value['description'],
                'type' => $value['type'],
                'amount' => $value['amount'],
                'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
            ]);
        }
        
        $log = 'Bank Statement Successfully Import';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Bank Statement Successfully Import',
            'alert-type' => 'success'
        );
        return redirect()->route('bank.index')->with($notification);
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
}

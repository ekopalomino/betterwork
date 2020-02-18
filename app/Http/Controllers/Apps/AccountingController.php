<?php

namespace iteos\Http\Controllers\Apps;

use Illuminate\Http\Request;
use iteos\Http\Controllers\Controller;
use iteos\Models\BankAccount;
use iteos\Models\BankStatement;
use iteos\Models\BankTransaction;
use iteos\Models\ChartOfAccount;
use iteos\Models\AccountStatement;
use iteos\Models\AccountTransaction;
use Maatwebsite\Excel\Facades\Excel;
use iteos\Imports\BankTransactionImport;

class AccountingController extends Controller
{
    public function index()
    {
    	return view('apps.pages.accountingHome');
    }

    public function bankIndex()
    {
    	$data = BankStatement::orderBy('updated_at','DESC')->get();
    	$banks = BankAccount::pluck('bank_name','id')->toArray();

    	return view('apps.pages.bankStatement',compact('data','banks'));
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
    	$data = BankStatement::find($id);

    	return view('apps.input.bankStatement',compact('data'))->renderSections()['content'];
    }

    public function bankStatementImport(Request $request,$id)
    {
    	$request->validate([
            'statement' => 'required|file|mimes:xlsx,xls,XLSX,XLS'
        ]);
 
        $input = $request->all();
        Excel::import(new BankTransactionImport, $request->file('statement'));

        $log = 'File Ekspor berhasil disimpan';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'File Ekspor berhasil disimpan',
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

    public function transactionCreate()
    {
    	return view('apps.input.transaction');
    }
}

<?php

namespace iteos\Imports;

use iteos\Models\BankTransaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BankTransactionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BankTransaction([
            'bank_statement_id' => $request->route('id'),
            'transaction_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['Transaction_Date']),
            'reference' => $row['Reference'],
            'payee' => $row['Payee'],
            'description' => $row['Description'],
            'type' => $row['Type'],
            'amount' => $row['Amount'],
            'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
        ]);
    }
}

<?php

namespace iteos\Imports;

use iteos\Models\BankTransaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class BankTransactionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BankTransaction([
            'transaction_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),
            'reference' => $row['reference'],
            'payee' => $row['payee'],
            'description' => $row['description'],
            'type' => $row['type'],
            'amount' => $row['amount'],
            'status_id' => 'e6cb9165-131e-406c-81c8-c2ba9a2c567e',
        ]);
    }
}

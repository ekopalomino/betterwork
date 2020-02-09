<?php

namespace iteos\Imports;

use iteos\Models\EmployeeSalary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
use Carbon\Carbon;

class SalaryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeSalary([
            'payroll_period' => Carbon::parse($row['period'])->format('Y-m-d','Asia/Jakarta'),
            'employee_no' => $row['id_no'],
            'nett_salary' => $row['nett_salary'],
            'jkk' => $row['jkk'],
            'jkm' => $row['jkm'],
            'leave_balance' => $row['leave_balance'],
            'rewards' => $row['rewards'],
            'expense' => $row['expense'],
            'bpjs' => $row['bpjs'],
            'jht' => $row['jht'],
            'jp' => $row['jp'],
            'income_tax' => $row['income_tax'],
            'receive_payroll' => $row['receive_payroll'],
            'created_by' => auth()->user()->employee_id,
        ]);
    }
}

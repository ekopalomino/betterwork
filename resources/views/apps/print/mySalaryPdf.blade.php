<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
</head>
<body>
	<img src="{{ asset('public/assets/img/logo.png') }}" style="opacity: .8"></img>
	<p style="text-align: center;"><strong>Salary Slip</strong></p>
	<p style="text-align: justify;"><strong>Employee Name : {{$data->first_name}} {{$data->last_name}}</strong></p>
	<p style="text-align: justify;"><strong>Employee ID : {{$data->employee_no}}</strong></p>
	<p style="text-align: justify;"><strong>Position : {{$data->grade}}</strong></p>
	<p style="text-align: justify;"><strong>Period : {{date("F Y",strtotime($data->payroll_period)) }}</strong></p>
	<table style="border-color: 000000;width=1024">
		<tbody>
			<tr>
				<td style="width: 151px; text-align: center;" colspan="2"><strong>ALLOWANCE</strong></td>
				<td style="width: 152px; text-align: center;" colspan="2"><strong>DEDUCTION</strong></td>
			</tr>
			<tr>
				<td style="width: 151px;">Basic Salary</td>
				<td style="width: 151px;">Rp {{ number_format($data->nett_salary,0,',','.')}}</td>
				<td style="width: 152px;">Iuran Ketenagakerjaan</td>
				<td style="width: 152px;">Rp {{ number_format($iuran,0,',','.')}}</td>
			</tr>
			<tr>
				<td style="width: 152px;">Iuran Ketenagakerjaan</td>
				<td style="width: 152px;">Rp {{ number_format($iuran,0,',','.')}}</td>
				<td style="width: 152px;">Iuran BPJS Kesehatan</td>
				<td style="width: 152px;">Rp {{ number_format($data->bpjs,0,',','.')}}</td>
			</tr>
			<tr>
				<td style="width: 152px;">Iuran BPJS Kesehatan</td>
				<td style="width: 152px;">Rp {{ number_format($data->bpjs,0,',','.')}}</td>
				<td style="width: 152px;">Income Tax</td>
				<td style="width: 152px;">Rp {{ number_format($data->income_tax,0,',','.')}}</td>
			</tr>
			<tr>
				<td style="width: 152px;">Income Tax</td>
				<td style="width: 152px;">Rp {{ number_format($data->income_tax,0,',','.')}}</td>
				<td style="width: 152px;">Others</td>
				<td style="width: 152px;">Rp 0</td>
			</tr>
			<tr>
				<td style="width: 152px;">Leave Balance</td>
				<td style="width: 152px;">Rp {{ number_format($data->leave_balance,0,',','.')}}</td>
				<td style="width: 152px;"></td>
				<td style="width: 152px;"></td>
			</tr>
			<tr>
				<td style="width: 152px;">Annual Staff Reward</td>
				<td style="width: 152px;">Rp {{ number_format($data->rewards,0,',','.')}}</td>
				<td style="width: 152px;"></td>
				<td style="width: 152px;"></td>
			</tr>
			<tr>
				<td style="width: 151px;">Total Allowance</td>
				<td style="width: 151px;">Rp {{ number_format($income,0,',','.')}}</td>
				<td style="width: 152px;">Total Deduction</td>
				<td style="width: 152px;">Rp {{ number_format($outcome,0,',','.')}}</td>
			</tr>
			<tr>
				<td style="width: 151px; text-align: right;" colspan="3"><strong>TOTAL SALARY</strong></td>
				<td style="width: 152px;">Rp {{ number_format($nett,0,',','.')}}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
		
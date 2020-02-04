<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('employee_id');
            $table->date('payroll_period');
            $table->decimal('total_payroll',50,2);
            $table->decimal('total_allowance',50,2);
            $table->decimal('total_renumeration',50,2);
            $table->decimal('receive_payroll',50,2);
            $table->uuid('created_by');
            $table->uuid('approved_by')->nullable();
            $table->primary('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_salaries');
    }
}

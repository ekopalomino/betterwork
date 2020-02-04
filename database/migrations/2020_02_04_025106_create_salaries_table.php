<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('employee_salary_id');
            $table->decimal('basic_salary',50,2);
            $table->decimal('jkk',50,2);
            $table->decimal('jkm',50,2);
            $table->decimal('bpjs',50,2);
            $table->decimal('jht',50,2);
            $table->decimal('jp',50,2);
            $table->decimal('income_tax_year',50,2);
            $table->decimal('income_tax_month',50,2);
            $table->foreign('employee_salary_id')->references('id')->on('employee_salaries')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('salaries');
    }
}

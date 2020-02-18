<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_statement_id')->unsigned();
            $table->date('transaction_date');
            $table->string('account_no');
            $table->string('account_name');
            $table->string('payee');
            $table->string('description')->nullable();
            $table->decimal('amount',50,2);
            $table->foreign('bank_statement_id')->references('id')->on('bank_statements')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('bank_transactions');
    }
}

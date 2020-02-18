<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('account_statement_id');
            $table->date('transaction_date');
            $table->string('account_no');
            $table->string('account_name');
            $table->string('payee');
            $table->string('description')->nullable();
            $table->decimal('amount',50,2);
            $table->uuid('status_id');
            $table->foreign('account_statement_id')->references('id')->on('account_statements')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('account_transactions');
    }
}

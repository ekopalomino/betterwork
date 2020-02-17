<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('bank_id');
            $table->date('statement_period');
            $table->decimal('balance',50,2)->nullable();
            $table->uuid('status_id');
            $table->foreign('bank_id')->references('id')->on('bank_accounts')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('bank_statements');
    }
}

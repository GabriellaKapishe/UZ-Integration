<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        $table->id();
        $table->string('product_type', 255)->nullable();
        $table->string('reg_number', 255)->nullable();
        $table->decimal('amount', 13, 2)->nullable();
        $table->string('student_name', 255)->nullable();
        $table->string('mobile', 255)->nullable();
        $table->string('acquirer_remote_reference', 255)->nullable();
        $table->string('status', 255)->nullable();
        $table->string('reference', 255)->nullable();
        $table->string('payment_channel', 255)->nullable();
        $table->string('currency', 255)->nullable();
        $table->float('rate')->nullable();
        $table->string('rrn', 255)->nullable();
        $table->string('ref', 255)->nullable();
        $table->string('imei', 255)->nullable();
        $table->string('pan', 255)->nullable();
        $table->string('user_id', 255)->nullable();
        $table->string('terminal_id', 255)->nullable();
        $table->string('branch', 255)->nullable();
        $table->string('code', 255)->nullable();
        $table->string('description', 255)->nullable();
        $table->string('uzFeesStatus', 255)->nullable();
        $table->integer('uzRef')->nullable();
        $table->string('verified', 255)->nullable();
        $table->string('teller', 255)->nullable();
        $table->string('cover_note', 255)->nullable();
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

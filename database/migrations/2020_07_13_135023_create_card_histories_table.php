<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('orderId');
            $table->string('baokim_txn_id')->nullable();
            $table->string('card_type');
            $table->string('card_code');
            $table->string('card_serial');
            $table->float('card_amount');
            $table->float('card_real_amount')->nullable();
            $table->float('card_fee_amount')->nullable();
            $table->integer('status');
            $table->float('ingame_amount');
            $table->integer('baokim_txn_success')->nullable();
            $table->integer('game_txn_sucsess')->nullable();
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
        Schema::dropIfExists('card_histories');
    }
}

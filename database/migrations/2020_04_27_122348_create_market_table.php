<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('currency');
            $table->string('second_currency');
            $table->timestamps();
        });

        $markets = ["BTC","LTC","ETH","BCH"];
        foreach ($markets as $value) {
            DB::table('market')->insert(["currency" => $value, "second_currency" => "USD", "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now(),]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('group_id');
            $table->timestamps();
            $table->foreign('group_id','category_group');
        });

        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('memo');
            $table->float('amount');
            $table->enum('transaction_type',['income','outcome']);
            $table->integer('category_id');
            $table->timestamps();
            $table->foreign('category_id','categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_group');
    }
}

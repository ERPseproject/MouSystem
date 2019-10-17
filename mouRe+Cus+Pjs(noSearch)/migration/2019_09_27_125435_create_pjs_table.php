<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pjs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('leader');
            $table->string('mem1')->nullable();
            $table->string('mem2')->nullable();
            $table->string('mem3')->nullable();
            $table->string('proid');
            $table->string('type');
            $table->string('cname')->nullable();
            $table->integer('budget')->nullable();
            $table->string('fname')->nullable();
            $table->date('opend')->nullable()->default(null);
            $table->date('closed')->nullable()->default(null);
            $table->integer('year')->nullable();
            $table->integer('total')->default(0); //บวกเพิ่มจาก money ของ recipe
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
        Schema::dropIfExists('pjs');
    }
}

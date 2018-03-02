<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",64)->index();
            $table->string("group");
            $table->string("path");
            $table->integer("order")->unsigned();
            $table->char('lang', 4)->index();
            $table->boolean('active')->default(0)->unsigned();
            $table->timestamps();
            $table->unique(array('name', 'lang'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}

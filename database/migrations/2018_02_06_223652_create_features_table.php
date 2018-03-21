<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 64)->index();
            $table->string('title')->nullable();
            $table->string('summary')->nullable();
            $table->string('dimension')->nullable();
            $table->char('lang', 4)->index();
            $table->timestamps();
            $table->unique(array('slug', 'lang'));
        });

        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feature_id')->unsigned();
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('parent_id')->unsigned()->nullable()->index();
            $table->foreign('parent_id')->references('id')->on('links')->onDelete('restrict')->onUpdate('cascade');
            $table->string('title')->nullable();
            $table->string('label')->nullable();
            $table->text('summary')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->char('lang', 4)->index();
            $table->integer('order')->default(0)->unsigned();
            $table->boolean('active')->default(1)->unsigned();
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
        Schema::dropIfExists('links');
        Schema::dropIfExists('features');
    }
}

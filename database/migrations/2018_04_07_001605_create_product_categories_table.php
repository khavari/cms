<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->index();
            $table->foreign('parent_id')->references('id')->on('product_categories')->onDelete('restrict')->onUpdate('cascade');

            $table->string('slug', 64)->index();
            $table->string('title');
            $table->text('summary')->nullable();
            $table->text('body')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();

            $table->string('image')->nullable();
            $table->char('lang', 4)->index();
            $table->string("options")->nullable();
            $table->integer("order")->default(0)->unsigned();
            $table->boolean('featured')->default(0)->unsigned();
            $table->boolean('active')->default(1)->unsigned();
            $table->timestamps();
            $table->unique(array('slug', 'lang'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}

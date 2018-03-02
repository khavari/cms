<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');

            $table->integer('vocabulary_id')->unsigned()->index();


            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');

            $table->string('slug',64)->index();
            $table->string('title');
            $table->text('summary')->nullable();
            $table->text('body')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('image')->nullable()->comment('uploads/contents/year/month/1518208452.jpg');
            $table->integer('views')->default(0)->unsigned();
            $table->integer("order")->default(1)->unsigned();
            $table->boolean('featured')->default(0)->unsigned();
            $table->boolean('active')->default(1)->unsigned();
            $table->char('lang', 4)->index();
            $table->timestamp('published_at');
            $table->timestamps();
            $table->unique(array('vocabulary_id', 'slug', 'lang'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}

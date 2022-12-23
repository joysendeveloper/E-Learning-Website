<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('subcate_id')->unsigned();
            $table->string('instructor_name');
            $table->string('course_title');
            $table->text('course_description');
            $table->integer('lessons');
            $table->integer('regular_price');
            $table->integer('discount_price');
            $table->string('image');
            $table->boolean('show_on_user')->default(0);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcate_id')->references('id')->on('subcategories');
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
        Schema::dropIfExists('courses');
    }
};

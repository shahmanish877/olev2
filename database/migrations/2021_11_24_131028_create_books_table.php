<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('isbn');
            $table->string('publication');
            $table->date('published_date');
            $table->text('description');
            $table->text('thumbnail')->nullable();
            $table->text('video_link')->nullable();
            $table->text('docs')->nullable();
            $table->unsignedBigInteger('class_level_id');
            $table->unsignedBigInteger('academic_id');
            $table->timestamps();

            $table->foreign('class_level_id')->references('id')->on('class_levels')->onDelete('cascade');
            $table->foreign('academic_id')->references('id')->on('academics')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

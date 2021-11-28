<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookBookTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_book_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_type_id');
            $table->unsignedBigInteger('book_id');

            //$table->timestamps();

            $table->foreign('book_type_id')->references('id')->on('book_types')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_book_type');
    }
}

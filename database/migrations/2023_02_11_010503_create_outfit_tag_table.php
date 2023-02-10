<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutfitTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outfit_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outfit_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->foreign('outfit_id')->references('id')->on('outfits')->onDelete('cascade')->unique();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outfit_tag');
    }
}

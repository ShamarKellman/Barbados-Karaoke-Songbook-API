<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistSongPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_song', function (Blueprint $table) {
            $table->integer('artist_id')->unsigned()->index();
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->integer('song_id')->unsigned()->index();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->primary(['artist_id', 'song_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_song');
    }
}

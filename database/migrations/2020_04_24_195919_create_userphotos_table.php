<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userphotos', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('photo_id');
            $table->timestamps();
            $table->primary(array('user_id', 'photo_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userphotos');
    }
}

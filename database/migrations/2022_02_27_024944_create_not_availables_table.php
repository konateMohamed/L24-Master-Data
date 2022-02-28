<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotAvailablesTable extends Migration
{

    public function up()
    {
        Schema::create('not_availables', function (Blueprint $table) {
            $table->id();
            $table->text('partnumber');
            $table->text('comment');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('not_availables');
    }
}

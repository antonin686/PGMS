<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('desc');
            $table->string('catagory');
            $table->string('subCatagory');
            $table->string('path');
            $table->bigInteger('u_id');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('imgs');
    }
}

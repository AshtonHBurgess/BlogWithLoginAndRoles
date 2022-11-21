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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('content');
            $table->foreignId('created_by');
            $table->foreignId('deleted_by');
            $table->timestamps();
            $table->softDeletes();
            //    //define constraints
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

//$table->string('first_name');
//$table->string('last_name');
//$table->foreignId('country_id');
//$table->timestamps();
//    //define constraints
//$table->foreign('country_id')->references('id')->on('countries');
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

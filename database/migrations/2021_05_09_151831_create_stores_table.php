<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('facebookLink');
            $table->string('twitterLink');
            $table->string('storeActivityType');
            $table->string('conditionOfUse');
            $table->string('designName');
            $table->string('client_id');
            $table->string('client_secret');
            $table->mediumText('image_top'); // it will store the link of the image here not the image itself!
            $table->mediumText('image_bottom'); // it will store the link of the image here not the image itself!
            //the image will be stored inside one of our application's folders.
            $table->mediumText('textLayer_top');
            $table->mediumText('textLayer_bottom');
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('stores');
    }
}

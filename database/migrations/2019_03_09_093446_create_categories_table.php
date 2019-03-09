<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('categories', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('title');
        //     $table->string('slug')->unique();
        //     $table->timestamps();
        // });

       Schema::table('categories', function($table) {
            $table->string('status')->after('description');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('categories');
        Schema::table('categories', function($table) {
            $table->text('status')->after('slug');

         });
        
    }
}


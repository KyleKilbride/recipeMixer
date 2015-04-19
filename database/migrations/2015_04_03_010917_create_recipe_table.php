<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->longText('description');
            $table->integer('category_id')->unsigned();   
            $table->foreign('category_id')->references('id')->on('categories');         
            $table->timestamps();
		});
        
       Schema::create('ingredient_recipes', function(Blueprint $table){
            $table->integer('recipe_id')->length(10)->unsigned()->index();
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->integer('ingredient_id')->length(10)->unsigned()->index();  
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');  
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
		Schema::drop('recipes');
		Schema::drop('ingredient_recipes');
	}

}

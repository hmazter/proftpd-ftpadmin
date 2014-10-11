<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebuserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webusers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('password', 100);
            $table->rememberToken();
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
		Schema::drop('webusers');
	}

}

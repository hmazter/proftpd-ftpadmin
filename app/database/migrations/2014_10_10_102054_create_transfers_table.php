<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transfers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('file');
            $table->integer('size');
            $table->integer('duration');
            $table->string('userid', 30);
            $table->enum('type', array('RETR','STOR'));
            $table->dateTime('when');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transfers');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('userid', 30);
            $table->string('client_ip', 30);
            $table->string('server_ip', 30);
            $table->string('protocol', 30);
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
        Schema::drop('logins');
    }
}

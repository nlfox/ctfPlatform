<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('name');
            $table->text('value');
			$table->timestamps();

		});
        $intro = new \App\Settings();
        $intro->name = 'introduction';
        $intro->value = '2333';
        $intro->save();
        $stat = new \App\Settings();
        $stat->name = 'started';
        $stat->value = 0;
        $stat->save();

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}

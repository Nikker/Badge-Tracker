<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullBadgeCount extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('challengers', function (Blueprint $table) {
			$table->integer('current_season_badges')->default(0)->nullable()->unsigned()->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('challengers', function (Blueprint $table) {
			// not necessary
		});
	}
}

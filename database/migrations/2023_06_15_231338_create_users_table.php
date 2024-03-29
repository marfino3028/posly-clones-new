<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 192);
			$table->string('nama', 192);
			$table->string('email', 192);
			$table->string('no_hp', 192);
			$table->string('villages', 192);
			$table->string('district', 192);
			$table->string('city', 192);
			$table->string('province', 192);
			$table->string('country', 192);
			$table->string('alamat', 192);
			$table->string('kode_pos', 192);
			$table->dateTime('email_verified_at')->nullable();
			$table->string('avatar', 192)->nullable();
			$table->boolean('status')->default(1);
			$table->bigInteger('role_users_id')->unsigned()->index('users_role_users_id');
			$table->boolean('is_all_warehouses')->default(0);
			$table->string('password', 192);
			$table->string('remember_token', 100)->nullable();
			$table->text('email_confirmation_token')->nullable();
			$table->timestamps(6);
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

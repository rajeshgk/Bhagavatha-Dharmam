<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribers', function(Blueprint $table)
		{
			//$table->increments('id');
			$table->string('account_id')->primary();
			$table->integer('entry_no');
			$table->timestamp('date_of_join')->nullable();
			$table->string('title')->nullable();
			$table->string('initial')->nullable();
			$table->string('name')->nullable();
			$table->string('type')->nullable();
			$table->string('door_no')->nullable();
			$table->string('address1')->nullable();
			$table->string('address2')->nullable();
			$table->string('address3')->nullable();
			$table->string('city')->nullable();
			$table->integer('pincode')->nullable();
			$table->string('phone_no')->nullable();
			$table->string('mobile_no')->nullable();
			$table->string('email')->nullable();
			$table->string('active')->default("Y");
			$table->timestamp('cancelled_on')->nullable();
			$table->timestamps();
			
			$table->index('name');
			$table->index('phone_no');
			$table->index('mobile_no');
			$table->index('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('subscribers');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->integer('patient_age');
			$table->integer('bags_num');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->string('phone');
			$table->text('notes');
            $table->softDeletes(); // This will add a deleted_at field
			$table->float('longitude',10,8)->nullable();
			$table->float('latitude', 10,8)->nullable();
			$table->bigInteger('blood_type_id')->unsigned()->nullable();
			$table->bigInteger('city_id')->unsigned()->nullable();
			$table->bigInteger('client_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}

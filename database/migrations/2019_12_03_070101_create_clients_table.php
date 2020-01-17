<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->date('date_of_birth');
            $table->date('last_donation_date');
            $table->integer('pin_code');
            $table->softDeletes(); // This will add a deleted_at field
            $table->string('api_token','60')->unique()->nullable();
            $table->bigInteger('blood_type_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('notification_settings_text')->nullable();
			$table->text('about_app');
			$table->string('phone')->nullable();
			$table->string('header_logo');
			$table->string('footer_logo');
			$table->string('slogan')->nullable();
			$table->string('email')->nullable();
			$table->string('fb_link')->nullable();
			$table->string('intro_image');
			$table->string('tw_link')->nullable();
			$table->string('github_link')->nullable();
			$table->string('address')->nullable();
			$table->string('whatsupp_number')->nullable();
			$table->string('youtube_link')->nullable();
			$table->string('insta_link')->nullable();
			$table->string('app_logo')->nullable();
			$table->string('play_store_link')->nullable();
			$table->string('app_store_link')->nullable();
			$table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
            $table->softDeletes(); // This will add a deleted_at field
			$table->string('title');
			$table->string('content');
			$table->text('des');
			$table->string('image');
			$table->bigInteger('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}

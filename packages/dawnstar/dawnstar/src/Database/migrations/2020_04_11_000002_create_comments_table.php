<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.min
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id');
            $table->tinyInteger('status')->default(2);
            $table->tinyInteger('useful')->default(1);
            $table->tinyInteger('read_status')->default(0);
            $table->string('user_ip')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->text('detail');
            $table->timestamps();
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
        Schema::dropIfExists('comments');
    }
}

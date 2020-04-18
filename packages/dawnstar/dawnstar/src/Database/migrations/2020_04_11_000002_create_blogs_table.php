<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.min
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('category_id');
            $table->integer('order')->default(0);
            $table->tinyInteger('status')->default(2);
            $table->date('date')->nullable();
            $table->float('useful_rate', 3,2)->default(0.00);
            $table->integer('view_count')->default(0);
            $table->string('name');
            $table->string('slug');
            $table->text('detail');
            $table->text('cover')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}

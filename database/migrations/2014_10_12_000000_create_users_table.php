<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nickname')->nullable();
            $table->string('living_area')->nullable();
            $table->date('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('img_url', 3000)->nullable();
            $table->string('score')->nullable();
            $table->text('self_produce')->nullable();
            $table->text('message')->nullable();
            $table->string('provider')->nullable();
            $table->string('line_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

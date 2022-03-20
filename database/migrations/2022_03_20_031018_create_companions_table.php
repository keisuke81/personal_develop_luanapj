<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement()->startingValue(100000);
            $table->string('name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nickname')->nullable();
            $table->date('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('img_url', 3000)->nullable();
            $table->string('score')->nullable();
            $table->text('self_produce')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('companions');
    }
}

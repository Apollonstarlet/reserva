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
            $table->id();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
			$table->string('paternal_surname', 16)->nullable()->default(null);
			$table->string('maternal_surname', 16)->nullable()->default(null);
			$table->string('rfc', 16)->nullable()->default(null);
            $table->string('email', 60)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->date('birthday')->nullable()->default(null);
			$table->enum('sex', array('male', 'female'));
			$table->enum('marital', array('1', '2', '3', '4'));
            $table->string('address', 100)->nullable()->default(null);
            $table->string('phone', 32)->nullable()->default(null);
            $table->string('telephone', 32)->nullable()->default(null);
            $table->char('image', 20)->default('default.jpg');
            $table->string('postal_code', 5)->nullable()->default(null);
            $table->enum('role', array('super', 'staff', 'client'));
            $table->string('verification_code', 100)->nullable();
            $table->integer('is_verified')->default(0);
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
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentapis', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->boolean('gender')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('education')->nullable(false);
            $table->integer('year')->nullable(false);

            $table->mediumText('profile')->nullable(false);
            $table->string('skills')->nullable(false);
            $table->mediumText('certificate')->nullable();
            $table->boolean('profession')->nullable(false);
            $table->string('company')->nullable();
            $table->string('job_started')->nullable();
            $table->string('business_name')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('mobile')->nullable(false);
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
        Schema::dropIfExists('studentapis');
    }
}

<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->integer('phone_number')->unique();
            $table->integer('ssn')->unique();
            $table->integer('age');
            $table->string('address');
            $table->string('pastjob');
            $table->string('leader');
            $table->string('job_desc');
            $table->string('status');
            $table->integer('salary');
            $table->string('img');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};

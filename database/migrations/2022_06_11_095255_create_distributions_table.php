<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            $table->string('identity_id');
            $table->string('name');
            $table->string('fatherName');
            $table->string('job');
            $table->string('tazkira');
            $table->string('rank_id');
            $table->string('unit_id');
            $table->date('date');
            $table->string('address');
            $table->string('phone');
            
            $table->string('description');

            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('distributions');
    }
}

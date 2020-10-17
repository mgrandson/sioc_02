<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\ReferenceParser;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('tradename')->nullable();
            $table->String('business_line')->nullable();
            $table->string('tax_num_id')->nullable();
            $table->string('taxpayer_reg_num')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('business_status')->nullable();
            $table->integer('type')->nullable();

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
        Schema::dropIfExists('businesses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('last_name')->after('name');
            $table->integer('access_level')->after('password');
            $table->integer('user_type')->after('password');
            $table->string('job', 25)->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('last_name');
            $table->dropColumn('job');
            $table->dropColumn('access_level');
            $table->dropColumn('user_type');
        
        });
    }
}

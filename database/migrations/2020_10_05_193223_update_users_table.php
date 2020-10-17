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
        Schema::table('users', function (Blueprint $table) {
            /*$table->bigInteger('role_id')->after('id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');*/
            $table->foreignId('role_id')->nullable()->after('id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('last_name')->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function (Blueprint $table) {
            //Schema::disableForeignKeyConstraints();
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
            $table->dropColumn('last_name');

            //Schema::enableForeignKeyConstraints();
        });
    }
}

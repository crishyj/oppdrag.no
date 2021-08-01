<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users', function (Blueprint $table) {
                $table->foreign('city_id')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('country_id')->references('id')->on('countries')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('role_id')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('NO ACTION');
            }
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'users', function (Blueprint $table) {
                $table->dropForeign('users_city_id_foreign');
                $table->dropForeign('users_country_id_foreign');
                $table->dropForeign('users_role_id_foreign');
                $table->dropForeign('users_state_id_foreign');
            }
        );
    }

}

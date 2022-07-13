<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->after("name");
            $table->dateTime('birthday')->after("password");
            $table->integer('status')->after("birthday");
            $table->string('avatar',1024)->after("status")->default("/avatar/avatar.jfif");
            $table->softDeletes();
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
            $table->dropColumn('age');
            $table->dropColumn('birthday');
            $table->dropColumn('status');
            $table->dropColumn('avatar');
            $table->dropSoftDeletes();
        });
    }
};

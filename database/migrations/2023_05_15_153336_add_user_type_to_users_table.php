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
            $table->string('profession')->after('email')->nullable();
            $table->string('user_type')->nullable()->after('password')->nullable();
            $table->string('gender')->nullable()->after('user_type')->nullable();
            $table->string('description')->nullable()->after('gender')->nullable();
            $table->string('profile_photo')->default('default.png')->after('description')->nullable();

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
            //
        });
    }
};

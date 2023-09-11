<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            // Update the 'description' field to 'text'
            $table->text('description')->change();

            // Add 'types' field with 3 enums
            $table->enum('types', ['phone_sms', 'faxes', 'directory'])->default('phone_sms')->unique();

            // Add 'image' field
            $table->string('image')->default('default.png');

            // Add 'links' field
            $table->string('links')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            // If you want to rollback these changes, you can define the 'down' operations here.
            $table->dropColumn(['types', 'image', 'links']);
        });
    }
};

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
        Schema::table('users', function ($table) {
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth')->nullable();
            $table->string('contact')->nullable();
            $table->string('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('last_name');
            $table->dropColumn('gender');
            $table->dropColumn('birth');
            $table->dropColumn('contact');
            $table->dropColumn('city');
        });
    }
};

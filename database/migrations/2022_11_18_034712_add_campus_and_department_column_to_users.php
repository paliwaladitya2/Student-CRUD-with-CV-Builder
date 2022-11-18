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
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('campus_id')->nullable()->references('id')->on('campus')->onDelete('cascade');
            $table->foreign('department_id')->nullable()->references('id')->on('department')->onDelete('cascade');
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
            $table->dropForeign(['campus_id']);
            $table->dropForeign(['department_id']);
        });
    }
};

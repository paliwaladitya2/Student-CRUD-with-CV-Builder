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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Personal Informations
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('nationality');
            $table->string('religion');
            $table->string('marital_status');
            $table->date('date_of_birth');
            $table->longText('present_adddress');
            $table->longText('permanent_adddress');
            $table->longText('mailing_adddress');
            $table->longText('objective');
            $table->string('photo_name');
            $table->string('photo_path');

            // Education Qualifications
            // SSC Informations
            $table->string('ssc_year');
            $table->string('ssc_group');
            $table->string('ssc_board');
            $table->string('ssc_result');

            // HSC Informations
            $table->string('hsc_year')->nullable()->default('');
            $table->string('hsc_group')->nullable()->default('');
            $table->string('hsc_board')->nullable()->default('');
            $table->string('hsc_result')->nullable()->default('');

            // Diploma Informations
            $table->string('diploma_year')->nullable()->default('');
            $table->string('diploma_group')->nullable()->default('');
            $table->string('diploma_board')->nullable()->default('');
            $table->string('diploma_result')->nullable()->default('');
            
            // BSc Informations
            $table->string('bsc_year')->nullable()->default('');
            $table->string('bsc_group')->nullable()->default('');
            $table->string('bsc_board')->nullable()->default('');
            $table->string('bsc_result')->nullable()->default('');
            
            // MSc Informations
            $table->string('msc_year')->nullable()->default('');
            $table->string('msc_group')->nullable()->default('');
            $table->string('msc_board')->nullable()->default('');
            $table->string('msc_result')->nullable()->default('');

            // Additional Informations
            $table->longText('experience')->nullable()->default('');
            $table->longText('references')->nullable()->default('');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
};

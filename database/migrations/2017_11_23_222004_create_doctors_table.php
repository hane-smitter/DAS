<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            /**
             * •	id
            •	userId
            •	registrationNo.
            •	educationalDegrees
            •	specializationDepartment
            •	specializationDepartmentId
            •	chamberAddress
            •	chamberAddressGeoLocation
            •	visitfee
            •	isActiveForSchedulilng
            •	isChamberCurrentlyOpen
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->ondelete('cascade');
            $table->string('doctorName');
            $table->integer('registrationNo');
            $table->string('educationalDegrees');
            $table->integer('specializationDepartmentId');
            $table->string('specializationDepartment');
            $table->string('specializationDepartmentKeywords', 500)->nullable();
            $table->string('chamberAddress');
            $table->string('chamberAddressGeoLocation');
            $table->string('visitFee');
            $table->boolean('isActiveForScheduling');
            $table->boolean('isChamberCurrentlyOpen');


        });
        DB::statement('ALTER TABLE `doctors` ADD FULLTEXT INDEX doctor_search_index (doctorName,chamberAddress,specializationDepartment,specializationDepartmentKeywords)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function($table) {
            $table->dropIndex('doctor_search_index');
        });
        Schema::dropIfExists('doctors');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('violation_records', function (Blueprint $table) {
            $table->bigIncrements('vlr_id');
            $table->unsignedBigInteger('vlr_student_id');
            $table->unsignedBigInteger('vlr_violation_id');
            $table->timestamps();
            $table->renameColumn('updated_at', 'vlr_updated_at');
            $table->renameColumn('created_at', 'vlr_created_at');
            $table->unsignedBigInteger('vlr_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('vlr_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('vlr_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'vlr_deleted_at');
            $table->string('vlr_sys_note')->nullable();


            $table->foreign('vlr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('vlr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('vlr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('vlr_student_id')->references('std_id')->on('students')->onDelete('cascade');
            $table->foreign('vlr_violation_id')->references('vlt_id')->on('violations')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation_records');
    }
};

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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('std_id');
            $table->string('std_name');
            $table->unsignedBigInteger('std_classes_id');
            $table->timestamps();
            $table->renameColumn('updated_at', 'std_updated_at');
            $table->renameColumn('created_at', 'std_created_at');
            $table->unsignedBigInteger('std_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('std_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('std_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'std_deleted_at');
            $table->string('std_sys_note')->nullable();


            $table->foreign('std_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_classes_id')->references('cls_id')->on('classes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

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
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('cls_id');
            $table->string('cls_level');
            $table->unsignedBigInteger('cls_major_id');
            $table->string('cls_number');
            $table->timestamps();
            $table->renameColumn('updated_at', 'cls_updated_at');
            $table->renameColumn('created_at', 'cls_created_at');
            $table->unsignedBigInteger('cls_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('cls_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('cls_updated_by')->unsigned()->nullable();
            $table->softDeletes();
            $table->string('cls_sys_note')->nullable();

            $table->renameColumn('deleted_at', 'cls_deleted_at');
            $table->foreign('cls_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cls_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cls_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cls_major_id')->references('mjr_id')->on('majors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};

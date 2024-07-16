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
        Schema::create('majors', function (Blueprint $table) {
            $table->bigIncrements('mjr_id');
            $table->string('mjr_name');
            $table->timestamps();
            $table->renameColumn('updated_at', 'mjr_updated_at');
            $table->renameColumn('created_at', 'mjr_created_at');
            $table->unsignedBigInteger('mjr_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('mjr_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('mjr_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'mjr_deleted_at');
            $table->string('mjr_sys_note')->nullable();


            $table->foreign('mjr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mjr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mjr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('major');
    }
};

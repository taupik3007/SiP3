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
        Schema::create('violations', function (Blueprint $table) {
            $table->bigIncrements('vlt_id');
            $table->string('vlt_name');
            $table->bigInteger('vlt_point');
            $table->timestamps();
            $table->renameColumn('updated_at', 'vlt_updated_at');
            $table->renameColumn('created_at', 'vlt_created_at');
            $table->unsignedBigInteger('vlt_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('vlt_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('vlt_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'vlt_deleted_at');
            $table->string('vlt_sys_note')->nullable();


            $table->foreign('vlt_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('vlt_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('vlt_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};

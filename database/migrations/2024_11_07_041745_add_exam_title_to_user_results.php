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
        Schema::table('user_results', function (Blueprint $table) {
            $table->string('exam_title')->nullable(); // Add the exam_title column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_results', function (Blueprint $table) {
            $table->dropColumn('exam_title'); // Drop the exam_title column if the migration is rolled back
        });
    }
};

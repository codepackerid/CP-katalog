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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('figma_url')->nullable()->after('demo_url');
            $table->string('video_url')->nullable()->after('figma_url');
            $table->json('features')->nullable()->after('technologies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('figma_url');
            $table->dropColumn('video_url');
            $table->dropColumn('features');
        });
    }
};

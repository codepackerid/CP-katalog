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
            if (!Schema::hasColumn('projects', 'figma_url')) {
                $table->string('figma_url')->nullable()->after('demo_url');
            }
            if (!Schema::hasColumn('projects', 'video_url')) {
                $table->string('video_url')->nullable()->after('figma_url');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'figma_url')) {
                $table->dropColumn('figma_url');
            }
            if (Schema::hasColumn('projects', 'video_url')) {
                $table->dropColumn('video_url');
            }
        });
    }
};

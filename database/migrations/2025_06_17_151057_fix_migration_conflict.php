<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Let's make sure columns exist properly without causing errors
        try {
            // Check if figma_url exists
            $figmaColumnExists = Schema::hasColumn('projects', 'figma_url');
            $videoColumnExists = Schema::hasColumn('projects', 'video_url');
            
            // Log current status
            Log::info('Migration fix status', [
                'figma_url_exists' => $figmaColumnExists,
                'video_url_exists' => $videoColumnExists
            ]);
            
            if (!$figmaColumnExists) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('figma_url')->nullable()->after('demo_url');
                });
                Log::info('Added figma_url column');
            }
            
            if (!$videoColumnExists) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('video_url')->nullable()->after('figma_url');
                });
                Log::info('Added video_url column');
            }
            
            // Make sure we have the features column
            if (!Schema::hasColumn('projects', 'features')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->json('features')->nullable()->after('technologies');
                });
                Log::info('Added features column');
            }
            
            // Make sure the columns are in MySQL DB
            DB::statement('SHOW COLUMNS FROM projects');
            
        } catch (\Exception $e) {
            Log::error('Error in migration: ' . $e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to do anything here since we're just fixing
    }
};

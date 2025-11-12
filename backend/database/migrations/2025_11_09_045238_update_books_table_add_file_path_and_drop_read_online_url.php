<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // 🗑️ Drop the old column
            if (Schema::hasColumn('books', 'read_online_url')) {
                $table->dropColumn('read_online_url');
            }

            // 📥 Add the new PDF file path column
            $table->string('file_path')->nullable()->after('back_cover');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Rollback: remove file_path and add back read_online_url
            $table->dropColumn('file_path');
            $table->string('read_online_url')->nullable()->after('back_cover');
        });
    }
};

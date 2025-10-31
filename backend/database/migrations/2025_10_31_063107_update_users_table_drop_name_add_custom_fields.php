<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop default 'name' column if exists
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }

            // Add new columns
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->date('date_of_birth')->nullable()->after('last_name');
            $table->string('phone_number')->after('date_of_birth'); // not nullable
            $table->unsignedBigInteger('genderID')->after('phone_number'); // FK
            $table->text('address')->nullable()->after('genderID');

            // Add foreign key
            $table->foreign('genderID')->references('id')->on('genders')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['genderID']);

            // Drop the custom columns
            $table->dropColumn([
                'first_name',
                'last_name',
                'date_of_birth',
                'phone_number',
                'genderID',
                'address',
            ]);

            // Add back default 'name' column
            $table->string('name')->after('id');
        });
    }
};

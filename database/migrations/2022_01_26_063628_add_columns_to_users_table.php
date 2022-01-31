<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table
                ->string('username')
                ->unique()
                ->index()
                ->comment('Unique system username');
            $table
                ->string('specialization')
                ->comment('User Specialty');
            $table
                ->text('about')
                ->comment('About user');
            $table
                ->string('github_username')
                ->nullable()
                ->unique()
                ->comment('Unique username in github');
        });
    }

    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('specialization');
            $table->dropColumn('about');
            $table->dropColumn('github_username');
        });
    }
}

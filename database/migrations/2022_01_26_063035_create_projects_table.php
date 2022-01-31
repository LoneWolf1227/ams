<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up(): void
    {
        Schema::create('projects', static function (Blueprint $table) {
            $table->id();
            $table
                ->string('name')
                ->comment('Name of project which user worked with');
            $table
                ->string('photo')
                ->nullable()
                ->comment('Path to project photo');
            $table
                ->string('link')
                ->comment('Project link');
            $table
                ->text('description')
                ->comment('Description about project');
            $table
                ->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
}

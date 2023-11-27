<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    public function up(): void
    {
        Schema::create('skills', static function (Blueprint $table) {
            $table->id();
            $table
                ->string('name')
                ->comment('Skill name which user has');
            $table
                ->string('type')
                ->comment('Type of skill hard skill or soft skill');
            $table
                ->string('level')
                ->comment('Level of hard skill');
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
        Schema::dropIfExists('skills');
    }
}

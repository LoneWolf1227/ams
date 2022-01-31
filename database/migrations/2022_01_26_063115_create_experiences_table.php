<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', static function (Blueprint $table) {
            $table->id();
            $table
                ->string('title')
                ->comment('Experience title');
            $table
                ->string('sub_title')
                ->nullable()
                ->comment('Experience sub title');
            $table
                ->text('description')
                ->comment('Some think about experience');
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
        Schema::dropIfExists('experiences');
    }
}

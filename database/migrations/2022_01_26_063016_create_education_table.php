<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    public function up(): void
    {
        Schema::create('education', static function (Blueprint $table) {
            $table->id();
            $table
                ->string('title')
                ->comment('The specialty in which they studied');
            $table
                ->string('organization')
                ->comment('Name of the organization where you studied');
            $table
                ->date('start')
                ->comment('Start date of study');
            $table
                ->date('end')
                ->nullable()
                ->comment('Date of end of study if still studying empty');
            $table
                ->boolean('until')
                ->default(false)
                ->comment('true Still learning');
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
        Schema::dropIfExists('education');
    }
}

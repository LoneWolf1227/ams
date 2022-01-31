<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperLinksTable extends Migration
{
    public function up(): void
    {
        Schema::create('developer_links', static function (Blueprint $table) {
            $table->id();
            $table
                ->string('slug')
                ->comment('Link slug from php Enum');
            $table
                ->string('url')
                ->comment('Url for selected link');
            $table
                ->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('developer_links');
    }
}

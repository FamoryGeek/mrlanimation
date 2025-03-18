<?php

use App\Models\Content;
use App\Models\Visiteur;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Visiteur::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Content::class)->constrained()->onDelete('cascade');
            $table->enum('activity_type', ['like', 'comment', 'playlist', 'subscription']);
            $table->text('activity_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};

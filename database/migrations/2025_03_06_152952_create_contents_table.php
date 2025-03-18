<?php

use App\Models\Categorie;
use App\Models\User;
use App\Models\TypeContent;
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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(TypeContent::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Categorie::class)->constrained('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('description');
            $table->integer('duration')->nullable();
            $table->string('cover')->nullable();
            $table->string('file_path')->nullable(); // Pour la musique, vidéo, formation
            $table->string('url')->nullable(); // Pour les podcasts
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_published')->default(false);
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

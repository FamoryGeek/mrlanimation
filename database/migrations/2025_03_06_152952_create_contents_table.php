<?php

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
            $table->string('title');
            $table->text('description');
            $table->string('cover')->nullable();
            $table->string('file_path')->nullable(); // Pour la musique, vidéo, formation
            $table->string('url')->nullable(); // Pour les podcasts
            $table->boolean('subscription_required')->default(false);
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

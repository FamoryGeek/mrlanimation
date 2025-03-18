<?php

use App\Models\Visiteur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Visiteur::class)->constrained()->onDelete('cascade');
            $table->integer('total_likes')->default(0);
            $table->integer('total_comments')->default(0);
            $table->integer('total_playlists')->default(0);
            /* $table->integer('total_content_uploaded')->default(0); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stats');
    }
};

<?php

use App\Models\Comment;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Visiteur::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Content::class)->constrained()->onDelete('cascade');
            $table->integer('parent_id')->nullable();
            $table->text('text');
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

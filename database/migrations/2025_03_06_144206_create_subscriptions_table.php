<?php

use App\Models\TypeSubscription;
use App\Models\User;
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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Visiteur::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(TypeSubscription::class)->constrained()->onDelete('cascade');
            $table->enum('status', ['active', 'cancelled', 'expired']);
            $table->string('payment_method');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

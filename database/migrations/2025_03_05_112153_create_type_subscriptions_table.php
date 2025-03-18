<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('type_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price');
            $table->enum('interval', ['monthly', 'yearly']);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        DB::table('type_subscriptions')->insert([
            [
                'name' => 'free',
                'interval' => 'yearly',
                'price'=> 0,
            ],
            [
                'name' => 'bacic',
                'interval' => 'monthly',
                'price'=> 5000,
            ],
            [
                'name' => 'premium',
                'interval' => 'yearly',
                'price'=> 10000,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_subscriptions');
    }
};

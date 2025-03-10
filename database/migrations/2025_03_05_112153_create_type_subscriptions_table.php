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
            $table->float('price');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        DB::table('type_subscriptions')->insert([
            [
                'name' => 'free',
                'price'=> 0,
            ],
            [
                'name' => 'premium',
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

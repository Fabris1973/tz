<?php

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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->foreignId('seller_id')->constrained('organizations')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('organizations')->onDelete('cascade');
            $table->timestamp('operated_at')->useCurrent();
            
        });
            // Ограничение: продавец ≠ покупатель
            DB::statement('ALTER TABLE operations
            ADD CONSTRAINT check_seller_not_equal_buyer
            CHECK (seller_id != buyer_id)');
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      try {
        DB::statement('ALTER TABLE operations DROP CHECK check_seller_not_equal_buyer');
    } catch (\Exception $e) {
        
    }
    Schema::dropIfExists('operations');
    }
};

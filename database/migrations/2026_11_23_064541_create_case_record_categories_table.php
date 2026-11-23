
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_record_categories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('case_categories')
                ->restrictOnDelete();

            $table->text('details')->nullable();

            $table->timestamps();

            $table->unique([
                'case_record_id',
                'category_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_record_categories');
    }
};

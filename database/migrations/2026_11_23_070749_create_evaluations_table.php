<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->restrictOnDelete();

            $table->date('evaluation_date');

            $table->longText('findings')->nullable();
            $table->longText('recommendations')->nullable();
            $table->longText('outcome')->nullable();

            $table->foreignId('evaluated_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->timestamps();

            $table->index([
                'case_record_id',
                'evaluation_date'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
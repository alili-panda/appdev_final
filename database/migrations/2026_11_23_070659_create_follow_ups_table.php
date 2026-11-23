<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();

            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->restrictOnDelete();

            $table->date('follow_up_date');
            $table->date('actual_follow_up_date')->nullable();

            $table->longText('findings')->nullable();
            $table->longText('next_action')->nullable();

            $table->string('follow_up_status')->default('scheduled');

            $table->foreignId('handled_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->index([
                'case_record_id',
                'follow_up_date'
            ]);

            $table->index('follow_up_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};
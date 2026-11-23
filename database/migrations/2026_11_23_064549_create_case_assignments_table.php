
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_assignments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->cascadeOnDelete();

            $table->foreignId('social_worker_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('assigned_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('assigned_at');

            $table->timestamp('ended_at')->nullable();

            $table->string('assignment_status')
                ->default('active');

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index([
                'social_worker_id',
                'assignment_status',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_assignments');
    }
};


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_assessments', function (Blueprint $table) {
            $table->id();

            // Case relationship
            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->restrictOnDelete();

            // Assessment information
            $table->date('assessment_date');

            // Section IV - Problem Presented
            $table->longText('problem_presented')
                ->nullable();

            // Section V - Background/History
            $table->longText('background_history')
                ->nullable();

            // Section VI - Significant Observations
            $table->longText('significant_observations')
                ->nullable();

            // Section VII - Plan of Action/Recommendations
            $table->longText('plan_action_recommendations')
                ->nullable();

            // Handling Social Worker
            $table->foreignId('prepared_by')
                ->constrained('users')
                ->restrictOnDelete();

            // Head Social Worker
            $table->foreignId('reviewed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Review information
            $table->timestamp('reviewed_at')->nullable();

            // Assessment status
            $table->string('assessment_status')
                ->default('draft');

            $table->timestamps();

            // Indexes
            $table->index([
                'case_record_id',
                'assessment_date'
            ]);

            $table->index('assessment_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_assessments');
    }
};

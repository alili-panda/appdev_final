
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();

            // Related case
            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->restrictOnDelete();

            // Intervention details
            $table->string('intervention_type');

            $table->longText('description')->nullable();

            $table->date('intervention_date');

            // Service provider
            $table->string('service_provider')->nullable();

            // Outcome and remarks
            $table->longText('outcome')->nullable();

            $table->longText('remarks')->nullable();

            // Responsible social worker
            $table->foreignId('handled_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->index([
                'case_record_id',
                'intervention_date'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};

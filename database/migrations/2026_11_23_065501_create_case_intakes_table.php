
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_intakes', function (Blueprint $table) {
            $table->id();

            // One optional intake form per case
            $table->foreignId('case_record_id')
                ->unique()
                ->constrained('case_records')
                ->restrictOnDelete();

            // Intake information
            $table->date('intake_date')->nullable();

            // Action required
            $table->boolean('protective_custody')
                ->nullable();

            $table->boolean('case_management_outside_shelter')
                ->nullable();

            // Interview readiness
            $table->boolean('willing_to_be_interviewed')
                ->nullable();

            $table->boolean('able_to_be_interviewed')
                ->nullable();

            // Intake form status
            $table->string('intake_status')
                ->default('draft');

            // Personnel responsible
            $table->foreignId('prepared_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('reviewed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_intakes');
    }
};

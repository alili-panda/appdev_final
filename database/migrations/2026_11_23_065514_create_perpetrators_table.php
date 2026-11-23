
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perpetrators', function (Blueprint $table) {
            $table->id();

            $table->foreignId('case_intake_id')
                ->constrained('case_intakes')
                ->cascadeOnDelete();

            // Personal information
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();

            $table->unsignedTinyInteger('age')->nullable();

            $table->string('educational_background')->nullable();

            $table->string('civil_status')->nullable();

            $table->string('relationship_to_victim_survivor')
                ->nullable();

            $table->string('estimated_relationship_length')
                ->nullable();

            // Physical description
            $table->text('physical_description')->nullable();

            // Contact and employment
            $table->text('present_address')->nullable();

            $table->string('contact_number', 30)->nullable();

            $table->string('occupation')->nullable();

            $table->decimal('estimated_daily_income', 12, 2)
                ->nullable();

            $table->timestamps();

            $table->index('case_intake_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perpetrators');
    }
};

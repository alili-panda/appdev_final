
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('case_intake_id')
                ->constrained('case_intakes')
                ->cascadeOnDelete();

            // Family member information
            $table->string('name');

            $table->unsignedTinyInteger('age')->nullable();

            $table->string('relationship_to_client')
                ->nullable();

            $table->string('educational_attainment')
                ->nullable();

            $table->string('occupation')->nullable();

            $table->decimal('monthly_income', 12, 2)
                ->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index('case_intake_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};

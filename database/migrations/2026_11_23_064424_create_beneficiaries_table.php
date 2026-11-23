
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();

            // Linked client account (optional)
            $table->foreignId('user_id')
                ->nullable()
                ->unique()
                ->constrained('users')
                ->nullOnDelete();

            // Personal information
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('nickname_alias')->nullable();

            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthplace')->nullable();

            // Civil and educational information
            $table->string('legal_status')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('school_last_attended')->nullable();
            $table->text('school_address')->nullable();

            // Employment and income
            $table->string('occupation')->nullable();
            $table->decimal('estimated_daily_income', 12, 2)
                ->nullable();

            // Contact information
            $table->text('present_address')->nullable();
            $table->string('contact_number', 30)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};

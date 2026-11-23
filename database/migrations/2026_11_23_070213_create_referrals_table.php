
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();

            // Related case
            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->restrictOnDelete();

            // Referral identification
            $table->string('referral_number')
                ->nullable()
                ->unique();

            // Receiving agency
            $table->string('receiving_agency');

            $table->string('contact_person')->nullable();

            $table->string('contact_number', 30)->nullable();

            // Referral details
            $table->date('referral_date');

            $table->longText('reason_for_referral')
                ->nullable();

            $table->longText('services_requested')
                ->nullable();

            // Referral monitoring
            $table->string('referral_status')
                ->default('pending');

            $table->date('response_date')->nullable();

            $table->longText('response_remarks')
                ->nullable();

            // Personnel who prepared the referral
            $table->foreignId('prepared_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->index([
                'case_record_id',
                'referral_status'
            ]);

            $table->index('referral_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};

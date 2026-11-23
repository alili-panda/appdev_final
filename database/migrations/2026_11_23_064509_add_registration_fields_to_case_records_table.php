
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('case_records', function (Blueprint $table) {

            $table->string('case_number')
                ->nullable()
                ->unique();

            $table->foreignId('beneficiary_id')
                ->nullable()
                ->constrained('beneficiaries')
                ->restrictOnDelete();

            $table->date('date_received')->nullable();

            $table->date('date_referred')->nullable();

            $table->string('referring_party')->nullable();

            $table->string('case_status')
                ->default('pending');

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('closed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('case_records', function (Blueprint $table) {

            $table->dropConstrainedForeignId('beneficiary_id');
            $table->dropConstrainedForeignId('created_by');

            $table->dropUnique(['case_number']);

            $table->dropColumn([
                'case_number',
                'date_received',
                'date_referred',
                'referring_party',
                'case_status',
                'closed_at',
            ]);
        });
    }
};

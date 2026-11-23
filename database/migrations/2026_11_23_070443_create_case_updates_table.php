
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_updates', function (Blueprint $table) {
            $table->id();

            // Related case
            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->restrictOnDelete();

            // Case status history
            $table->string('previous_status')->nullable();
            $table->string('new_status');

            // Update details
            $table->longText('remarks')->nullable();

            // Personnel responsible for the update
            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Date and time of status change
            $table->timestamp('status_changed_at')->useCurrent();

            $table->timestamps();

            $table->index([
                'case_record_id',
                'status_changed_at'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_updates');
    }
};

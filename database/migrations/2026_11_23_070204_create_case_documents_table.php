
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_documents', function (Blueprint $table) {
            $table->id();

            // Related case
            $table->foreignId('case_record_id')
                ->constrained('case_records')
                ->restrictOnDelete();

            // Document information
            $table->string('document_title');
            $table->string('document_type');

            $table->string('original_filename');
            $table->string('file_path');

            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();

            $table->text('description')->nullable();

            // Document verification
            $table->string('verification_status')
                ->default('pending');

            // User who uploaded the document
            $table->foreignId('uploaded_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->index([
                'case_record_id',
                'document_type'
            ]);

            $table->index('verification_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_documents');
    }
};

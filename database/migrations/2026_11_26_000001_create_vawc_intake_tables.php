<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vawc_intakes', function (Blueprint $table) {
            $table->id();
            $table->string('case_number', 100)->unique();
            // Validate as new or old in the application.
            $table->string('case_type', 10);
            $table->date('referred_admitted_date')->nullable();
            $table->string('referring_party')->nullable();

            // Multiple checkboxes may be selected on the paper form.
            $table->boolean('physical_violence')->default(false);
            $table->boolean('psychological_violence')->default(false);
            $table->boolean('economic_abuse')->default(false);
            $table->boolean('sexual_abuse')->default(false);
            $table->boolean('sexual_abuse_incest')->default(false);
            $table->boolean('sexual_abuse_rape')->default(false);
            $table->boolean('sexual_abuse_acts_of_lasciviousness')->default(false);
            $table->boolean('sexual_abuse_sexual_harassment')->default(false);
            $table->text('sexual_abuse_other')->nullable();
            $table->boolean('sexual_exploitation')->default(false);
            $table->boolean('exploitation_prostitution')->default(false);
            $table->boolean('exploitation_illegal_recruitment')->default(false);
            $table->boolean('exploitation_pornography')->default(false);
            $table->boolean('exploitation_human_trafficking')->default(false);
            $table->text('sexual_exploitation_other')->nullable();

            $table->boolean('requires_protective_custody')->default(false);
            $table->boolean('requires_case_management_outside_shelter')->default(false);

            // Sections IV to VII.
            $table->longText('problem_presented')->nullable();
            $table->longText('problem_background_history')->nullable();
            $table->longText('significant_observations')->nullable();
            $table->longText('plan_of_action_recommendations')->nullable();

            // Store private storage paths, not image data or public URLs.
            $table->string('client_signature_thumbmark_path')->nullable();
            $table->date('client_signed_date')->nullable();
            $table->string('handling_social_worker_name')->nullable();
            $table->string('handling_social_worker_signature_path')->nullable();
            $table->date('prepared_date')->nullable();
            $table->string('head_social_worker_name')->nullable();
            $table->string('head_social_worker_signature_path')->nullable();
            $table->date('reviewed_date')->nullable();
            $table->timestamps();
        });

        Schema::create('vawc_victim_survivors', function (Blueprint $table) {
            $table->id();
            // One victim-survivor snapshot per intake form.
            $table->foreignId('vawc_intake_id')->unique()
                ->constrained('vawc_intakes')->restrictOnDelete();
            $table->string('last_name')->nullable();
            $table->string('given_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('nickname_alias')->nullable();
            $table->unsignedSmallInteger('age_at_intake')->nullable();
            $table->string('gender', 100)->nullable();
            $table->date('birthdate')->nullable();
            $table->text('birthplace')->nullable();
            $table->string('legal_status')->nullable();
            $table->string('civil_status', 100)->nullable();
            $table->string('religion')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('school_last_attended')->nullable();
            $table->string('year_last_attended', 50)->nullable();
            $table->text('school_address')->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('estimated_daily_income', 12, 2)->nullable();
            $table->text('present_address')->nullable();
            $table->string('contact_number', 50)->nullable();
            // null = unanswered; false = explicitly No.
            $table->boolean('willing_and_able_to_talk_at_first_interview')->nullable();
            $table->timestamps();
        });

        Schema::create('vawc_perpetrators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vawc_intake_id')
                ->constrained('vawc_intakes')->restrictOnDelete();
            $table->string('last_name')->nullable();
            $table->string('given_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->unsignedSmallInteger('age_at_intake')->nullable();
            $table->string('educational_background')->nullable();
            $table->string('civil_status', 100)->nullable();
            $table->string('relationship_to_victim_survivor')->nullable();
            // Free text permits answers such as "approximately three years".
            $table->string('estimated_relationship_length')->nullable();
            $table->text('physical_appearance_description')->nullable();
            $table->text('present_address')->nullable();
            $table->string('contact_number', 50)->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('estimated_daily_income', 12, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('vawc_family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vawc_intake_id')
                ->constrained('vawc_intakes')->restrictOnDelete();
            $table->unsignedSmallInteger('position');
            $table->string('name');
            $table->unsignedSmallInteger('age_at_intake')->nullable();
            $table->string('relationship_to_client')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('monthly_income', 12, 2)->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->unique(['vawc_intake_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vawc_family_members');
        Schema::dropIfExists('vawc_perpetrators');
        Schema::dropIfExists('vawc_victim_survivors');
        Schema::dropIfExists('vawc_intakes');
    }
};

<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Beneficiary relationship
    public function beneficiary()
    {
        return $this->hasOne(Beneficiary::class);
    }

    // Cases registered by this user
    public function createdCases()
    {
        return $this->hasMany(CaseRecord::class, 'created_by');
    }

    // Case assignments received by this user
    public function caseAssignments()
    {
        return $this->hasMany(CaseAssignment::class, 'social_worker_id');
    }

    // Assignments made by this user
    public function assignmentsMade()
    {
        return $this->hasMany(CaseAssignment::class, 'assigned_by');
    }

    // Case intakes prepared by this user
    public function preparedCaseIntakes()
    {
        return $this->hasMany(CaseIntake::class, 'prepared_by');
    }

    // Case intakes reviewed by this user
    public function reviewedCaseIntakes()
    {
        return $this->hasMany(CaseIntake::class, 'reviewed_by');
    }

    // Assessments prepared by this user
    public function preparedAssessments()
    {
        return $this->hasMany(CaseAssessment::class, 'prepared_by');
    }

    // Assessments reviewed by this user
    public function reviewedAssessments()
    {
        return $this->hasMany(CaseAssessment::class, 'reviewed_by');
    }

    // Documents uploaded by this user
    public function uploadedDocuments()
    {
        return $this->hasMany(CaseDocument::class, 'uploaded_by');
    }

    // Referrals prepared by this user
    public function preparedReferrals()
    {
        return $this->hasMany(Referral::class, 'prepared_by');
    }

    // Case status updates made by this user
    public function caseUpdates()
    {
        return $this->hasMany(CaseUpdate::class, 'updated_by');
    }

    // Interventions handled by this user
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'handled_by');
    }

    // Follow-ups handled by this user
    public function followUps()
    {
        return $this->hasMany(FollowUp::class, 'handled_by');
    }

    // Evaluations performed by this user
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'evaluated_by');
    }

    // Activity history
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}

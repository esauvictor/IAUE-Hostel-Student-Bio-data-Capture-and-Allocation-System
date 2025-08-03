<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $table = 'hostels';
    protected $primaryKey = 'id';

    protected $fillable = [
        'photo',
        'matriculation_number',
        'name',
        'date_of_birth',
        'sex',
        'marital_status',
        'year_of_entry',
        'level',
        'department',
        'faculty',
        'campus',
        'state_of_origin',
        'local_government_area',
        'residential_address',
        'phone_number',
        'email',
        'club_membership',
        'hostel_choice',
        'acknowledgement_of_consent',
        'status',
        'assigned_Room',
    ];

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->formatTitle($value);
    }

    public function setMatriculationNumberAttribute($value)
    {
        $this->attributes['matriculation_number'] = strtoupper($value);
    }

    public function setHostelChoiceAttribute($value)
    {
        $this->attributes['hostel_choice'] = $this->formatTitle($value);
    }

    public function setStateOfOriginAttribute($value)
    {
        $this->attributes['state_of_origin'] = $this->formatTitle($value);
    }

    public function setDepartmentAttribute($value)
    {
        $this->attributes['department'] = $this->formatTitle($value);
    }

    public function setFacultyAttribute($value)
    {
        $this->attributes['faculty'] = $this->formatTitle($value);
    }

    public function setCampusAttribute($value)
    {
        $this->attributes['campus'] = $this->formatTitle($value);
    }

    public function setLocalGovernmentAreaAttribute($value)
    {
        $this->attributes['local_government_area'] = $this->formatTitle($value);
    }

    public function setResidentialAddressAttribute($value)
    {
        $this->attributes['residential_address'] = $this->formatTitle($value);
    }

    public function setClubMembershipAttribute($value)
    {
        $this->attributes['club_membership'] = $this->formatTitle($value);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getMatriculationNumberAttribute($value)
    {
        return strtoupper($value);
    }

    public function getHostelChoiceAttribute($value)
    {
        return strtoupper($value);
    }

    public function getStateOfOriginAttribute($value)
    {
        return strtoupper($value);
    }

    public function getDepartmentAttribute($value)
    {
        return strtoupper($value);
    }

    public function getFacultyAttribute($value)
    {
        return strtoupper($value);
    }

    public function getCampusAttribute($value)
    {
        return strtoupper($value);
    }

    public function getLocalGovernmentAreaAttribute($value)
    {
        return strtoupper($value);
    }

    public function getResidentialAddressAttribute($value)
    {
        return strtoupper($value);
    }

    public function getClubMembershipAttribute($value)
    {
        return strtoupper($value);
    }

    /*
    |--------------------------------------------------------------------------
    | PRIVATE HELPER
    |--------------------------------------------------------------------------
    */

    private function formatTitle($value): string
    {
        return ucwords(strtolower(trim($value))); // still used for storing consistently formatted values
    }
}

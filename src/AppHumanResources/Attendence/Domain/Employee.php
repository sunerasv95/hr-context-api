<?php

namespace Src\AppHumanResources\Attendence\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Src\AppHumanResources\Attendence\Domain\Schedule;
use Src\AppHumanResources\Attendence\Domain\Attendence;

class Employee extends Model
{
    use HasFactory;

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'schedule_id', 'id');
    }

    public function attendence_faults(): BelongsToMany
    {
        return $this->belongsToMany(Attendence::class, 'attendence_faults','attendence_id', 'employee_id' );
    }
}

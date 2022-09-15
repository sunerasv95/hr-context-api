<?php

namespace Src\AppHumanResources\Attendence\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Src\AppHumanResources\Attendence\Domain\Employee;

class Attendence extends Model
{
    use HasFactory;

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function attendence_faults(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'attendence_faults', 'employee_id', 'attendence_id');
    }
}

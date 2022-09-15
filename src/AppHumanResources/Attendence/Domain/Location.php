<?php

namespace Src\AppHumanResources\Attendence\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Src\AppHumanResources\Attendence\Domain\Schedule;

class Location extends Model
{
    use HasFactory;

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'schedule_id', 'id');
    }
}

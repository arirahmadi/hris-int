<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class emp_master extends Model
{
    protected $fillable = [
        'empno',
        'fullname',
        'city_id',
        'gender_id',
        'maritalstatus_id',
        'nationality_id',
        'religion_id',
      ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
    public function maritalstatus(): BelongsTo
    {
        return $this->belongsTo(Maritalstatus::class);
    }
    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class);
    }
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }
}

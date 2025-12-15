<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Learner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
    ];

    public function scopeSearchCourses(Builder $query, ?string $search): Builder
    {
        if (! $search) {
            return $query;
        }

        return $query->whereHas('courses', function ($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%");
        });
    }

    protected function averageProgress(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->courses->count() === 0) {
                    return 0;
                }

                $progressValues = $this->courses->pluck('pivot.progress')->filter(fn ($value) => $value !== null);

                if ($progressValues->isEmpty()) {
                    return 0;
                }

                return round($progressValues->sum() / $progressValues->count());
            }
        );
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'enrolments',
            'learner_id',
            'course_id'
        )->withPivot('progress');
    }

    public function enrolments(): HasMany
    {
        return $this->hasMany(Enrolment::class);
    }
}

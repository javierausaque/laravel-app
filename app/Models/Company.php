<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Company
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $logo
 * @property $website
 * @property $created_at
 * @property $updated_at
 *
 * @property Company $company
 * @property Company[] $companies
 * @property Employee[] $employees
 * @package App
 * @mixin Builder
 */
class Company extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'logo', 'website'];



    /**
     * @return HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'id', 'company_id');
    }


}

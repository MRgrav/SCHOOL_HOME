<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    /**
     * Get all profiles assigned to this role.
     */
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    /**
     * Check if the role matches a given string or model.
     * Compatible with parent Model::is($model).
     */
    public function is($model)
    {
        if (is_string($model)) {
            return $this->name === $model;
        }
        return parent::is($model);
    }
}

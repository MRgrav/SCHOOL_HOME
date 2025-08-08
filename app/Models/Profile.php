<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'role_id',
        'position',
        'department_id',
        'detail',
        'message',
    ];

    /**
     * Relationship: each profile belongs to a role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the role's display name easily (e.g. "Teacher").
     */
    public function getRoleName(): ?string
    {
        return $this->role?->display_name;
    }

    /**
     * Check if the profile has a specific role.
     */
    public function isRole(string $roleName): bool
    {
        return $this->role && $this->role->name === $roleName;
    }
}

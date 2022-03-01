<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bdate',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
		'role' => 0
	];

    public function getRole(){
        return [
            0 => 'user',
            1 => 'reviewer',
            2 => 'editor',
            3 => 'admin',
            4 => 'super_admin'
        ];
    }

    public function snippets(){
        return $this->hasMany(Snippet::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function getRoleAttribute($attribute){
		return $this->getRole()[$attribute];
	}

    public function scopeUsers($query){
		return $query->where('role','0');
	}

    public function scopeReviewers($query){
		return $query->where('role','1');
	}

    public function scopeEditors($query){
		return $query->where('role','2');
	}

    public function scopeAdmins($query){
		return $query->where('role','3');
	}

    public function scopeSuperAdmins($query){
		return $query->where('role','4');
	}

    public function scopeSystemAdmins($query){
		return $query->where('role','>=','3');
	}

    public function scopeWebAdmins($query){
		return $query->where('role','>','0');
	}
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Searchable;

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
		'role' => 0,
	];

    private function getRoles(){
        return [
            0 => 'user',
            1 => 'reviewer',
            2 => 'editor',
            3 => 'admin',
            4 => 'super_admin'
        ];
    }

    private function inRoleRange($num){
        return in_array($num,array_keys($this->getRoles()));
    }

    private function inRoles($role){
        return in_array($role,$this->getRoles());
    }

    private function getLevel($role){
        if($this->inRoles($role)){
            return array_search($role,$this->getRoles());
        }else{
            return -1;
        }
            
    }

    public function level(){
        return $this->getLevel($this->role);
    }

    #[SearchUsingPrefix(['id', 'email'])]
    #[SearchUsingFullText(['name'])]

    public function toSearchableArray(){
        return [
            'name' => $this->name,
            'email' => $this->email,
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

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    
    public function getRoleAttribute($attribute){
		return $this->getRoles()[$attribute];
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

    public function isUser(){
        return $this->status == 'user';
    }

    public function isReviewer(){
        return $this->status == 'reviewer';
    }
    
    public function isEditor(){
        return $this->status == 'editor';
    }

    public function isAdmin(){
        return $this->status == 'admin';
    }

    public function isSuperAdmin(){
        return $this->status == 'super_admin';
    }

    public function isOrAbove($role){
        $level = $this->getLevel($role);
        return ($this->inRoleRange($level) && $this->level() >= $level);
    }

    public function isOrBelow($role){
        $level = $this->getLevel($role);
        return ($this->inRoleRange($level) && $this->level() <= $level);
    }

    public function isAbove($role){
        $level = $this->getLevel($role);
        return ($this->inRoleRange($level) && $this->level() > $level);
    }

    public function isBelow($role){
        $level = $this->getLevel($role);
        return ($this->inRoleRange($level) && $this->level() < $level);
    }

    public function isSysAdmin(){
        return $this->isOrAbove('admin');
    }

    public function isWebAdmin(){
        return $this->isOrAbove('reviewer');
    }

    public function isOwner($object){
        return $this->id == $object->user_id;
    }

}

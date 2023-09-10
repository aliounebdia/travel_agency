<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'prenom', 'nom', 'email', 'password', 'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNomCompletAttribute()
    {
        return $this->prenom .' '. $this->nom;
    }

    public function getRoleAttribute()
    {
        return $this->getRoleNames()->first();
    }

    public function getRoleIdAttribute()
    {
        if ($this->getRoleNames()->first())
            return $this->getStoredRole($this->getRoleNames()->first())->id;
        return null;
    }

    public static function boot()
    {
        parent::boot();

        static::creating( function ($model)
        {
            $model->user_created = Auth::user()->id ?? null;
            $model->user_modified = Auth::user()->id ?? null;
        });

        static::updating( function ($model)
        {
            $model->user_modified = Auth::user()->id ?? null;
        });
    }

}

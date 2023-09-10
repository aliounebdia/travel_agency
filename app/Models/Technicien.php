<?php

namespace App\Models;
use app\Models\Equipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Technicien extends Model
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'prenom', 'nom', 'adresse', 'email', 'tel1', 'tel2', 'user_id',
    ];

    protected $appends = [
        'nom_contact'
    ];

    public function getNomCompletAttribute()
    {
        return $this->prenom .' '. $this->nom;
    }

    public function getNomContactAttribute()
    {
        return $this->nom_complet . (isset($this->email) ? ' | '. $this->email : '').
        (isset($this->tel1) ? ' | '. $this->tel1 : ((isset($this->tel2) ? ' | '. $this->tel2 : '')));
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
    /**
     * relation...
     */
    public function equipes()
    {
        return $this->belongsToMany(Equipe::class);
    }

}

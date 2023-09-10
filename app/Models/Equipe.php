<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Equipe extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom', 'leader_id'
    ];

    protected $appends = [
        'nom_contact_leader'
    ];

    public function getListeTechniciensAttribute()
    {
        $liste = '';
        foreach ($this->techniciens as $key => $technicien) {
            $liste.= $key > 0 ? ', ' : '';
            $liste.= $technicien->nom_complet;
        }
        return $liste;
    }

    public function getNomLeaderAttribute()
    {
        return $this->leader->nom_complet ?? '';
    }

    public function getNomContactLeaderAttribute()
    {
        return $this->leader->nom_contact ?? '';
    }

    /**
     * relation
     */
    public function techniciens()
    {
        return $this->belongsToMany(Technicien::class);
    }

    public function leader()
    {
        return $this->belongsTo(Technicien::class);
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

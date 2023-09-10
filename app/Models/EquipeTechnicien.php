<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EquipeTechnicien extends Model
{

    protected $table= 'equipe_technicien';
    protected $fillable=['equipe_id', 'technicien_id'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function technicien()
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


<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class ParcAuto extends Model
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'marque', 'modele', 'immatriculation', 'numchassi', 'couleur', 'kilometrage','dateimmat', 'photo','equipement'
    ];

    public function getDateimmatAttribute()
    {
        $attr = $this->attributes['dateimmat'];
        return  Carbon::parse($attr)->format('d/m/Y');
    }

    public function equipements()
    {
        return $this->hasMany(Equipement::class);
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

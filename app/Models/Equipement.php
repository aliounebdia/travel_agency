<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Equipement extends Model
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom_equipement', 'type_equipement'
    ];

    public function parc_auto()
    {
        return $this->belongsTo(ParcAuto::class);
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

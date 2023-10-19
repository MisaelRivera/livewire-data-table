<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'ordenes';
    public $timestamps = false;
    use HasFactory;

    public function cliente ()
    {
        return $this->belongsTo(Client::class, 'id_cliente', 'id');
    }

    public function siralab () {
        return $this->hasOne(Siralab::class, 'id_orden');
    }

    public function muestras () {
        return $this->hasMany(Sample::class, 'id_orden');
    }

    public function muestras_aguas () {
        return $this->hasMany(WaterSample::class, 'id_orden');
    }

    public function muestras_alimentos () {
        return $this->hasMany(FoodSample::class, 'id_orden');
    }

    protected function supervision (): Attribute {
        return Attribute::make(
            get: function ($value) {
               $result = DB::table('ordenes')
                ->selectRaw("IF((SELECT cesavedac FROM ordenes WHERE id = ?) = 1 OR (SELECT COUNT(id) FROM muestras WHERE muestras.id_orden = ? AND muestras.muestreador = 'Cliente') > 0, true, false) as result", [$this->attributes['id'], $this->attributes['id']])
                ->first();
                if ((int)$result->result === 1) {
                    return false;
                } else {
                    return $value;
                }
            }
        );
    } 
}

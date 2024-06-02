<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $telefono
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @property Servicio[] $servicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'telefono', 'email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->hasMany(\App\Models\Servicio::class, 'id', 'cliente_id');
    }
    
}

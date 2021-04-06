<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Cliente extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $fillable = ['nombre', 'apellido', 'cedula', 'descripcion', 'telefono', 'correo'];

    # QUERIES

    /**
     * Ordena el query por el campo especificado
     *
     * @param Illuminate\Database\Eloquent\Builder $query
     * @param String $campo, campo de la tabla por el cual ordenar los datos 
     * @param String $orden
     *
     * @return Illuminate\Database\Eloquent\Builder
     **/
    public function scopeOrden(Builder $query, string $campo, string $orden = 'asc') : Builder
    {
        $campo = in_array($campo, ['nombre', 'cedula', 'created_at']) ? $campo : 'nombre';

        return $query->orderBy($campo, $orden);
    }

    # SETTERS

    /**
     * Capitaliza el apellido del cliente
     * Ejm: fOO bAz => Foo Baz
     *
     * @return void
     **/
    public function setApellidoAttribute(?string $apellido) : void
    {
    	$this->attributes['apellido'] = Str::title($apellido);
    }

    /**
     * Arregla la 
     *
     * @return void
     **/
    public function setCedulaAttribute(?string $cedula) : void
    {
        if ($cedula[1] != '-') {
            $cedula = $cedula[0] . '-' . substr($cedula, 1, -1);
        }

        $this->attributes['cedula'] = Str::upper($cedula);
    }

    /**
     * Capitaliza el nombre del cliente
     * Ejm: john doe => John Doe
     *
     * @return void
     **/
    public function setNombreAttribute(?string $nombre) : void
    {
    	$this->attributes['nombre'] = Str::title($nombre);
    }

    # RELACIONES
    /**
     * Relación del cliente con una dirección
     *
     * @return HasOne
     **/
    public function direccion() : HasOne
    {
    	return $this->hasOne(Direccion::class);
    }
}

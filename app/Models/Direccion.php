<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = ['ciudad', 'parroquia', 'municipio', 'calle', 'calle', 'numero_casa'];

    protected $table = 'direcciones';

    /**
     * Relación inversa de la dirección con el cliente
     *
     * @return BelongsTo
     **/
    public function cliente() : BelongsTo
    {
    	return $this->belongsTo(Cliente::class);
    }
}

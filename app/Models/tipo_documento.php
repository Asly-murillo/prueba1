<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
    protected $table = 'tipo_documentos';

    public function users()
    {
        return $this->hasMany(User::class, 'tipo_documento_id');
    }
    
}

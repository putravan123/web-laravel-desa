<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'document';

    protected $guarded =['id'];

    
    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}

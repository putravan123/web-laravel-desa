<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setJenisKelaminAttribute($value)
    {
        // Ensure only 'L' or 'P' is stored, default to 'P' if invalid or empty
        $this->attributes['jenis_kelamin'] = in_array($value, ['L', 'P']) ? $value : 'P';
    }
    

    // In Data.php model
public function pekerjaan()
{
    return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pasiens';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'email',
        'nama',
        'alamat',
        'password',
        'no_ktp',
        'no_hp',
        'no_rm'
    ];

    protected $hidden = [
        'password'
    ];

    public function daftar_poli() : HasMany
    {
        return $this->hasMany(DaftarPoli::class, 'id_pasien', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JadwalPeriksa extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'jadwal_periksas';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id_dokter',
        'hari',
        'jadwal_mulai',
        'jadwal_selesai'
    ];

    public function dokters(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }

    public function daftar_polis(): HasMany
    {
        return $this->hasMany(DaftarPoli::class, 'id_jadwal', 'id');
    }
}

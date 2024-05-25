<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'dokters';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id_poli',
        'nama',
        'no_hp',
        'alamat'
    ];

    public function polis(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id');
    }

    public function jadwal_periksas(): HasMany
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter', 'id');
    }


}

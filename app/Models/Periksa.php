<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periksa extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'periksas';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id_daftar_poli',
        'tgl_periksa',
        'catatan'
    ];

    public function daftar_polis(): BelongsTo
    {
        return $this->belongsTo(DaftarPoli::class, 'id_daftar_poli', 'id');
    }

    public function detail_periksas(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa', 'id');
    }
}

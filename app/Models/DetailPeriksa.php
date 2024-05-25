<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPeriksa extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'detail_periksas';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id_periksa',
        'id_obat'
    ];

    public function periksas(): BelongsTo
    {
        return $this->belongsTo(Periksa::class, 'id_periksa', 'id');
    }

    public function obats(): BelongsTo
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}

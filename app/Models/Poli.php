<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poli extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'polis';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'nama_poli',
        'keterangan'
    ];

    public function dokters(): HasMany
    {
        return $this->hasMany(Dokter::class, 'id_poli', 'id');
    }
}

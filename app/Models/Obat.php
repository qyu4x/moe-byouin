<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'obats';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga'
    ];

    public function detail_periksas(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat', 'id');
    }
}

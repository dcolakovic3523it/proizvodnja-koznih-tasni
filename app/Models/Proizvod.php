<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proizvod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv',
        'opis',
        'cena',
        'stanje',
        'kategorija_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'cena' => 'decimal:2',
            'kategorija_id' => 'integer',
        ];
    }

    public function kategorija(): BelongsTo
    {
        return $this->belongsTo(Kategorija::class);
    }

    public function stavke() {
        return $this->hasMany(StavkaNarudzbine::class);
    }

}

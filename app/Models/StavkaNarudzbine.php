<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StavkaNarudzbine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proizvod_id',
        'narudzbina_id',
        'kolicina',
        'cena',
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
            'proizvod_id' => 'integer',
            'narudzbina_id' => 'integer',
            'cena' => 'decimal:2',
        ];
    }

    public function proizvod(): BelongsTo
    {
        return $this->belongsTo(Proizvod::class);
    }

    public function narudzbina(): BelongsTo
    {
        return $this->belongsTo(Narudzbina::class);
    }
}

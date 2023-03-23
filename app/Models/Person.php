<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'phone',
        'birth_date',
        'address_id',
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public static function rules(): array
    {
        return [
            'name' => 'string|max:255|min:2',
            'email' => 'string|email|max:255|unique:people',
            'cpf' => 'required|string|size:11|unique:people',
            'phone' => 'required|string|max:11|min:10',
            'birth_date' => 'required|date_format:Y-m-d|before_or_equal:today'
        ];
    }
}

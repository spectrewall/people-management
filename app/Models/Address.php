<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'city',
        'state',
        'number',
    ];

    public static function rules(): array
    {
        return [
            'street' => 'string|max:255|min:3',
            'city' => 'string|max:255|min:3',
            'state' => 'string|size:2',
            'number' => 'string|max:10',
        ];
    }
}

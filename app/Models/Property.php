<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'price',
        'bedrooms',
        'bathrooms',
        'type',
        'status',
    ];

    //To Always Add Type and Status In Uppercase
    protected static function boot()
    {
        parent::boot();

        // Listen for the saving event and convert type and status to uppercase
        static::saving(function ($model) {
            $model->type = strtoupper($model->type);
            $model->status = strtoupper($model->status);
        });
    }
}

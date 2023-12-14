<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'regular_price',
        'SKU', // Add SKU to the fillable array
        'price',
        'quantity',
        'category_id',
        // Add other attributes as needed
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name'])
        ->useLogName('user')
        ->dontSubmitEmptyLogs();
        // Chain fluent methods for configuration options
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName} user";
    }



    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    use HasFactory;



}

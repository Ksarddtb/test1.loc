<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $casts=[
        'data'=>'json'
    ];
    protected $fillable=['name','article','status','data'];

    public function scopeStatus($query)
    {
        return $query->where('status','available');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'parentID',
        'name',
        'description',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'parentID', 'id');
    }

}

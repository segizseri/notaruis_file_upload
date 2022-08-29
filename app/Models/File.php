<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'folder_id',
        'category_id',
        'path',
        'type'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

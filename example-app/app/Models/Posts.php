<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    
    protected $primaryKey = 'post_id';

    public $incrementing = true;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}

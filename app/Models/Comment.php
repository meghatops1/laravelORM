<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $table="comments";
    protected $primaryKey = "cid";

    protected $timestamp= true;
    protected $foreignKey = "postid";
    public function post(): BelongsTo{
        return $this->belongsTo(Post::class);
    }
}

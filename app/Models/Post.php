<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Post extends Model
{
    use HasFactory;

    protected $table="posts";

    protected $primaryKey ='id';
    protected $timestamp = true;

    protected $fillable=['title','description'];

    public function comment(): HasMany{
        return $this->hasMany(Comment::class);
    }

    public function postHas():HasOneThrough{
        return $this->hasOneThrough(
            LikeModel::class,
            Comment::class,
            'post_id',
            'commentid',
            'id',
            'cid'
        );
    }
}

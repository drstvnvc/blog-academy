<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title', 'body', 'is_published', 'user_id'];

  public static function published()
  {
    return self::where('is_published', 1);
  }

  public static function unpublished()
  {
    return self::where('is_published', 0);
  }

  public function getSomeInfo()
  {
    return random_int(1, 10);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function createComment($comment) {
    return $this->comments()->create([
      'body' => $comment
    ]);
  }
}

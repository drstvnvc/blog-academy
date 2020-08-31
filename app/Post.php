<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title', 'body', 'is_published'];

  public static function published() {
    return self::where('is_published', 1);
  }

  public static function unpublished() {
    return self::where('is_published', 0);
  }

  public function getSomeInfo()
  {
    return random_int(1, 10);
  }
}

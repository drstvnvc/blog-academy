<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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

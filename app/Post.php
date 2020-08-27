<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function getSomeInfo()
  {
    return random_int(1, 10);
  }
}

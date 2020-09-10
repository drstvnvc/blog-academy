<?php

use Illuminate\Database\Seeder;

use App\Tag;
class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Tag::create(['name' => 'Physics']);
      Tag::create(['name' => 'Science']);
      Tag::create(['name' => 'Computer science']);
      Tag::create(['name' => 'Programming']);
    }
}

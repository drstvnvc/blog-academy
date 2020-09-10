<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoBadWords implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      $this->attribute = $attribute;
      $badWords = [ 'idiot', 'stupid', 'hate' ];

      foreach ($badWords as $badWord) {
        if (\Str::contains($value, $badWord)) {
          $this->badWord = $badWord;
          return false;
        }
      }
      return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The ' . $this->attribute . ' field must not contain "' . $this->badWord . '" word.';
    }
}

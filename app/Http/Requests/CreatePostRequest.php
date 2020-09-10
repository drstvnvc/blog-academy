<?php

namespace App\Http\Requests;

use App\Rules\NoBadWords;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title' => 'required|string|max:50|unique:posts',
      'body' => ['required', 'string', new NoBadWords],
      'is_published' => 'sometimes|integer',
      'tags' => 'sometimes|array',
      'tags.*' => 'sometimes|exists:tags,id'
    ];
  }
}

<?php

namespace App\Http\Requests;

use App\Rules\NoBadWords;
use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
          'comment' => ['required', 'string', 'max:300', new NoBadWords]
        ];
    }
}

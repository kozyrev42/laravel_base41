<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // чтобы класс работал, необходимо включить 'true'
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
            'title' => 'string|required',
            'post_content' => 'string|required',
            'image' => 'string',
            'category_id' => 'integer',
            'tags' => '' // прилетает массив с выбранными тегами
        ];
    }
}

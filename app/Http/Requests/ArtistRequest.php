<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    public function attributes()
    {
        return [
            'name' => __('Name'),
            'genre' => __('Genre'),
            'image' => __('Imagem'),
            'description' => __('Description'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:191',
            'genre' => 'required|max:191',
            'description' => 'required|string',
        ];

        if (request()->isMethod('post')) {
            $rules['image'] = 'required|file';
        }

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'year' => __('Year'),
            'artist_id' => __('Artist'),
            'image' => __('Image'),
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
            'artist_id' => 'required|exists:artists,id',
            'name' => 'required|max:191',
            'year' => 'required|integer',
        ];

        if (request()->isMethod('post')) {
            $rules['image'] = 'required|file';
        }

        return $rules;
    }
}

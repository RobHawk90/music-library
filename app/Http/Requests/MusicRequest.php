<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicRequest extends FormRequest
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
            'order' => __('Order'),
            'duration' => __('Duration'),
            'composer' => __('Composer'),
            'album_id' => __('Album'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'order' => 'required|integer',
            'duration' => 'required',
            'composer' => 'required|max:191',
            'album_id' => 'required|exists:albums,id',
        ];
    }
}

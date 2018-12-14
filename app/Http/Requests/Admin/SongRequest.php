<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            'provider_id' => 'nullable:exist:providers',
            'code' => 'required|min:5|max:255',
            'is_popular' => 'boolean',
            'artist_id.*' => 'array|min:1',
            'genre_id.*' => 'array',
        ];
    }
}

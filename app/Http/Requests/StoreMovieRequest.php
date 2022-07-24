<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:50',
            'is_published' => 'nullable',
            'genres' => 'required|exists:genres,id',
            'poster'  => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ];
    }
}

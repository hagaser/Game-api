<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genres' => 'required|array',
            'genres.*' => 'required|string|max:255',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

use Illuminate\Support\Str;

class MetierRequest extends FormRequest
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
            'libelle'=> ['required', 'string', 'max:120'],
            'slug' => $this->method() == 'POST' ?
                ['required', 'string', 'max:120', 'unique:metiers,slug'] :
                ['required', 'string', 'max:120',
                    Rule::unique('metiers', 'slug')->ignore($this->metier)],
            'description'=>['required', 'string', 'max:500'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}


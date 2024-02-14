<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class ProfessionnelRequest extends FormRequest
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
            'prenom'=> ['required', 'string', 'max:25'],
            'nom'=> ['required', 'string', 'max:40'],
            'cp'=> ['required', 'string', 'between:5,5'],
            'ville'=> ['required', 'string', 'max:38'],
            'telephone'=> ['required', 'string', 'max:14'],
            'email'=> ['required', 'email:rfc,dns', Rule::unique('professionnels')->ignore($this->professionnel)],
            'naissance'=> ['required', 'date_format:Y-m-d'],
            'formation'=> ['required'],
            'domaine'=> ['required'],
            'metier_id'=>['required'],
            'cv'=>['file', 'sometimes', 'nullable', 'mimes:pdf', 'max:1229'],
            // 1229 Kilo-octets
 //         Pour relation 1-n 1-n Professionnel / Compétence
//          ================================================
            'comp'=>['required'],
        ];
    }

    public function messages(){
        return [
            'metier_id.required' => 'Vous devez sélectionner le métier principal du professionnel',
            'cp.required' => 'Le champ code postal est obligatoire.',
            'cp.between' => 'Le champ code postal doit contenir 5 caractères.',
            'naissance.required' => 'Le champ date de naissance est obligatoire.',
            //         Pour relation 1-n 1-n Professionnel / Compétence
//          ================================================
            'comp.required' => 'Veuillez sélectionner au moins une compétence.',
            'cv.max' => 'Le document pdf ne peut dépasser 1.2 Mo',
            'cv.uploaded' => 'Le serveur n\'accepte pas de fichier supérieur (cf. upload_max_filesize php.ini)',
        ];
    }
}

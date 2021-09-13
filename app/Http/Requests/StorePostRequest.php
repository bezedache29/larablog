<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        // On check si on cré un post ou si on l'edit
        // A la création l'image est obligatoire
        // A la modification elle ne l'est pas
        if (request()->routeIs('posts.store')) {
            $imageRule = 'image|required';
        } else if (request()->routeIs('posts.update')) {
            $imageRule = 'image|sometimes';
        }

        return [
            'title' => 'required',
            'content' => 'required',
            'image' => $imageRule,
            'category' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        // Pendant la validation s'il n'y a pas d'image on retire la validation image de la regle de validation
        if ($this->image == null) {
            $this->request->remove('image');
        }
    }
}

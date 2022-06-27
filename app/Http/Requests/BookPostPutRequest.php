<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostPutRequest extends FormRequest
{
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
            'author' => 'required',
            'title' => 'required',
            'edition' => 'required',
            'publish_data' => 'required',
            'content_type' => 'required',
            'provider' => 'required',
            'restrict_id' => 'required',
            'topic_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'author' => 'El autor es requerido',
            'title' => 'El titulo es requerido',
            'edition' => 'El edicion es requerido',
            'publish_data' => 'El datos de la publicacion es requerido',
            'content_type' => 'El tipon de contenido requerido',
            'provider' => 'El proveedor es requerido',
            'restrict_id' => 'Las restricciones son requeridos',
            'topic_id' => 'La materia es requerido',
        ];
    }
}

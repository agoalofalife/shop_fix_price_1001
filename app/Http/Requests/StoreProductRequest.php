<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProductRequest extends Request
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
            'title'            => 'required|max:255|min:1',
            'mark'             => 'required|max:255|min:1',
            'count'            => 'required|numeric',
            'description'      => 'min:10|max:15000',
            'status'           => 'required|boolean',
            'recommend'        => 'required|boolean',
        ];
    }
    //Переопределил метод для отображения ошибок
    public function forbiddenResponse()
    {

        return $this->redirector->back();

    }
}

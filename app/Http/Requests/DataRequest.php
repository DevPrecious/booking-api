<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'headerImage' => 'required|image',
            'name' => 'required',
            'timeAndNight' => 'required',
            'date' => 'required',
            'listPrice' => 'required',
            'withPrice' => 'required',
            'defaultImage' => 'required|image',
            'departureDate' => 'required',
            'returnDate' => 'required',
            'flying' => 'required',
            'included' => 'required',
            'tours' => 'required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'area_id' => 'required',
            'date' => 'required',
            'start_at' => 'required',
            'num_of_players_men' => 'required',
            'num_of_players_women' => 'required',
            'mens_level_id' => 'required',
            'required_level_id' => 'required',
            'required_age_min' => 'required |numeric | min:20',
            'required_age_max' => 'required | gte:required_age_min',
        ];
    }
}

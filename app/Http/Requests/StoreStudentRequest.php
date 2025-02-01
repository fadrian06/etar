<?php

namespace App\Http\Requests;

use App\Models\State;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['present', 'max:255'],
            'first_last_name' => ['required', 'string', 'max:255'],
            'second_last_name' => ['present', 'max:255'],
            'nationality' => ['required', 'in:V,E'],
            'id_card' => ['required', 'numeric', 'min:0'],
            'birthplace_state_id' => ['required', 'exists:' . State::class . ',id'],
            'birthplace_city_id' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'before:today', 'date_format:Y-m-d'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JourneyRequest extends FormRequest
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
            'date' => 'required',
            'route' => 'required',
            'exit_terminal_time' => 'required',
            'speedometer_stats_before' => 'required',
            'arrive_client_time' => 'required',
            'unloading_time_minutes' => 'required',
            'exit_client_time' => 'required',
            'arrive_terminal_time' => 'required',
            'speedometer_stats_after' => 'required',
            'distance_kms' => 'required',
            'vehicle_id' => 'required'
        ];
    }
}

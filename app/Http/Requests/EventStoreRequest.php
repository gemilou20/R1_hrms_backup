<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required'],
            'email'=>['required'],
            'tel_number'=>['required'],
            'res_date'=>['required', 'date', new DateBetween, new TimeBetween],
            'guest_number'=>['required'],
            'event_type'=>['required'],
            'other_request'=>['nullable'],
            'payment_status'=>['required'],
            'downpayment'=>['required'],
        ];
    }
}

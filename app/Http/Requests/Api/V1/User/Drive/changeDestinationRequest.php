<?php

namespace App\Http\Requests\Api\V1\User\Drive;

use App\Rules\LocationCoordinates\LatitudeRule;
use App\Rules\LocationCoordinates\LongitudeRule;
use Illuminate\Foundation\Http\FormRequest;

class changeDestinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->drive->user_id == auth()->id();
    }

    public function rules()
    {
        return [
            'hospital_id' => ['required', 'exists:hospitals,id'],
        ];
    }
}

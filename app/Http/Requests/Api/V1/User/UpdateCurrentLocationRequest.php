<?php

namespace App\Http\Requests\Api\V1\User;

use App\Rules\LocationCoordinates\LatitudeRule;
use App\Rules\LocationCoordinates\LongitudeRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrentLocationRequest extends FormRequest
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
            "lat" => ['required', new LatitudeRule()],
            'lng' => ['required', new LongitudeRule()]
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('lat') && $this->has('lng')) {
            $this->merge([
                'lat' => (double) $this->lat,
                'lng' => (double) $this->lng,
            ]);
        }
    }
}

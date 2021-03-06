<?php

namespace App\Http\Requests\Api\V1\User\Drive;

use App\Rules\LocationCoordinates\LatitudeRule;
use App\Rules\LocationCoordinates\LongitudeRule;
use Illuminate\Foundation\Http\FormRequest;

class MakeDriveRequest extends FormRequest
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
            's_lat' => ['required', new LatitudeRule()],
            's_lng' => ['required',  new LongitudeRule()]
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('s_lat') && $this->has('s_lng')) {
            $this->merge([
                's_lat' => (float) $this->s_lat,
                's_lng' => (float) $this->s_lng,
            ]);
        }
    }
}

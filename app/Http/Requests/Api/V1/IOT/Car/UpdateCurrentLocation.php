<?php

namespace App\Http\Requests\Api\V1\IOT\Car;

use App\Models\Drive\Car;
use App\Rules\LocationCoordinates\LatitudeRule;
use App\Rules\LocationCoordinates\LongitudeRule;
use BultonFr\NMEA\Parser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrentLocation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $car = Car::where('token', $this->token)->first();
        $this->merge([
            'car' => $car
        ]);
        return !is_null($car);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
        $location = $this->location;
        $data = (object)(new Parser())->readLine($location)->toArray();
        $this->merge([
            'lat' => (float) $data->latitude,
            'lng' => (float) $data->longitude,
        ]);
    }
}

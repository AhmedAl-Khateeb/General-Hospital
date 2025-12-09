<?php

namespace App\Http\Requests\Service;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $inUpdate = ! preg_match('/.*services$/', $this->url());

        return [
            'name' => 'array|between:2,2',
            'name.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'name.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'description' => 'array|between:2,2',
            'description.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
                'max' => 'max:1000',
            ]),
            'description.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
                'max' => 'max:1000',
            ]),

            'price' => ValidationRuleHelper::integerRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'status' => ValidationRuleHelper::booleanRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
        ];
    }
}

<?php

namespace App\Http\Requests\Doctor;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $inUpdate = ! preg_match('/.*doctors$/', $this->url());
        return [
            'name' => 'array|between:2,2',
            'name.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'name.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'appointments' => 'array|between:2,2',
            'appointments.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'appointments.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'email' => ValidationRuleHelper::emailRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'phone' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'examination_price' => ValidationRuleHelper::integerRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'password' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'section_id' => ValidationRuleHelper::foreignKeyRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'image' => ValidationRuleHelper::storeOrUpdateImageRules(true),
        ];
    }

    public function messages(): array
    {
        return [
            'name.ar.required' => 'الاسم بالعربية مطلوب.',
            'name.en.required' => 'الاسم بالانجليزية مطلوب.',

            'appointments.ar.required' => 'مواعيد الطبيب بالعربية مطلوبة.',
            'appointments.en.required' => 'مواعيد الطبيب بالانجليزية مطلوبة.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني غير صالح.',

            'phone.required' => 'رقم الهاتف مطلوب.',

            'price.required' => 'السعر مطلوب.',
            'price.integer' => 'السعر يجب أن يكون رقم صحيح.',

            'password.required' => 'كلمة المرور مطلوبة.',
            'password.string' => 'كلمة المرور يجب أن تكون نص.',

            'section_id.required' => 'يجب اختيار القسم.',
            'section_id.exists' => 'القسم المختار غير موجود.',

            'image.image' => 'الملف يجب أن يكون صورة.',
            'image.mimes' => 'الصورة يجب أن تكون jpg, jpeg, png, webp.',
        ];
    }
}

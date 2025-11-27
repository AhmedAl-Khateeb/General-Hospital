<?php

namespace App\Http\Requests\Doctor;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

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

            'email' => ValidationRuleHelper::emailRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'phone' => ValidationRuleHelper::phoneRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'password' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'nullable' : 'required',
            ]),

            'section_id' => ValidationRuleHelper::foreignKeyRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'appointment_ids' => 'nullable|array',
            'appointment_ids.*' => 'exists:appointments,id',
            'image' => ValidationRuleHelper::storeOrUpdateImageRules(true),
        ];
    }

    public function messages(): array
    {
        return [
            'name.ar.required' => 'الاسم بالعربية مطلوب.',
            'name.en.required' => 'الاسم بالانجليزية مطلوب.',

            // 'appointments.ar.required' => 'مواعيد الطبيب بالعربية مطلوبة.',
            // 'appointments.en.required' => 'مواعيد الطبيب بالانجليزية مطلوبة.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني غير صالح.',

            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.unique' => 'رقم الهاتف موجود',


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


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}

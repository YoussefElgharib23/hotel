<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class HoteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $hotel = auth()->user()->hotel()->first();

        return [
            'name' => [
                'required',
                'string',
                'unique:hotels,name,' . $hotel->id . ',id'
            ],
            'image' => [
                ValidationRule::when(!$hotel->image_path, 'required'),
                'image',
                'max:30000'
            ]
        ];
    }

    public function withUploadingImage()
    {
        $image = $this->file('image');
        if ($this->hasFile('image')) {
            $image_path = $image->store('hotels', 'public');
        } else {
            $image_path = auth()->user()->hotel()->first()->image_path;
        }

        return [
            ...$this->except('_token', 'image'),
            'image_path' => $image_path
        ];
    }
}

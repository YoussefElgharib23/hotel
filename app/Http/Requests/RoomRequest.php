<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        return [
            'room_category_id' => [
                'required',
                'numeric',
                'exists:room_categories,id'
            ],
            'phone' => [
                'required',
                'string'
            ],
            'image' => [
                'required',
                'image'
            ],
            'description' => [
                'required',
                'string'
            ],
            'prix_haut_saison' => [
                'required',
                'string'
            ],
            'prix_bas_saison' => [
                'required',
                'string'
            ],
        ];
    }

    public function withUploadingImage()
    {
        if ($this->hasFile('image')) {
            $imagePath = $this->file('image')->store('rooms', 'public');
        }
        else {
            $imagePath = $this->route('room')->image_path;
        }
        return [
            ...$this->except('token', 'image'),
            'image_path' => $imagePath
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CreateVacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|string:255',
            'content'=>'required|string:255',
            'location'=>'required|string:255',
            'imageUrl'=>'required|nullable|string:255',
            'type'=>'required|in:part-time, full-time',
            'category_id'=>'required|exists:'.Category::class.', id',
            'company_id'=>'required|exists:'.Company::class.', id',
        ];
    }
}

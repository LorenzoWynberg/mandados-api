<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Catalog;

class StoreCatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user()->can('create', Catalog::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:255|unique:catalogs,code',
            'name' => 'required|array',
            'name.en' => 'required|string|max:255',
            'name.es' => 'required|string|max:255',
            'name.fr' => 'required|string|max:255',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.es' => 'required|string',
            'description.fr' => 'required|string',
        ];
    }
}

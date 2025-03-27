<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\CatalogElement;

class UpdateCatalogElementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user()->can('update', CatalogElement::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => [
                'required',
                'integer',
                Rule::exists('catalog_elements', 'id'),
            ],
            'catalog_id' => [
                'sometimes',
                'integer',
                'exists:catalogs,id',
            ],
            'code' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('catalog_elements', 'code')
                    ->ignore(request()->route('catalog_element')->id)
                    ->where('catalog_id', request('catalog_id')),
            ],
            'name' => 'sometimes|array',
            'name.en' => 'sometimes|string|max:255',
            'name.es' => 'sometimes|string|max:255',
            'name.fr' => 'sometimes|string|max:255',
            'description' => 'sometimes|array',
            'description.en' => 'sometimes|string',
            'description.es' => 'sometimes|string',
            'description.fr' => 'sometimes|string',
            'order' => 'nullable|integer|min:1',
            'meta' => 'nullable|array',
        ];
    }
}

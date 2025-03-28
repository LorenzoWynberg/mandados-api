<?php

namespace App\Http\Requests;

use App\Models\CatalogElement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCatalogElementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): ?bool
    {
        return $this->user()?->can('create', CatalogElement::class);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $catalog_id = $this->input('catalog_id');
        if (! is_numeric($catalog_id)) {
            throw new \InvalidArgumentException('catalog_id must be numeric');
        }
        $catalog_id = (int) $catalog_id;

        return [
            'catalog_id' => [
                'required',
                'integer',
                'exists:catalogs,id',
            ],
            'code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('catalog_elements', 'code')
                    ->where('catalog_id', $catalog_id),
            ],
            'name' => 'required|array',
            'name.en' => 'required|string|max:255',
            'name.es' => 'required|string|max:255',
            'name.fr' => 'required|string|max:255',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.es' => 'required|string',
            'description.fr' => 'required|string',
            'order' => 'nullable|integer|min:1',
            'meta' => 'nullable|array',
        ];
    }
}

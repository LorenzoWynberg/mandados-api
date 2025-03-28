<?php

namespace App\Http\Requests;

use App\Models\Catalog;
use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): ?bool
    {
        return $this->user()?->can('create', Catalog::class);
    }

    /**
     * Get the validation rules that apply to the request.
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

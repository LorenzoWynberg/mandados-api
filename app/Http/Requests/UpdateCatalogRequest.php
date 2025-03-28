<?php

namespace App\Http\Requests;

use App\Models\Catalog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): ?bool
    {
        return $this->user()?->can('update', Catalog::class);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:catalogs,id',
            'name' => 'required_without:description|array',
            'name.en' => 'required_without_all:name.es,name.fr|string|max:255',
            'name.es' => 'required_without_all:name.en,name.fr|string|max:255',
            'name.fr' => 'required_without_all:name.en,name.es|string|max:255',
            'description' => 'required_without:name|array',
            'description.en' => 'required_without_all:description.es,description.fr|string',
            'description.es' => 'required_without_all:description.en,description.fr|string',
            'description.fr' => 'required_without_all:description.en,description.es|string',
        ];
    }
}

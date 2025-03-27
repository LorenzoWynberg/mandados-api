<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\UpdateCatalogElementRequest;
use App\Http\Requests\StoreCatalogElementRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\CatalogElement;
use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogElementController extends Controller
{
    use AuthorizesRequests;

    /**
     * Constructor
     * Binds the policy to the controller.
     */
    public function __construct()
    {
        $this->authorizeResource(CatalogElement::class, 'catalog_element');
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of elements for a given catalog.
     */
    public function index(Request $request): JsonResponse
    {
        $query = CatalogElement::query();

        // If a catalog ID is provided, filter by catalog
        if ($request->has('catalog_id')) {
            $query->where('catalog_id', $request->catalog_id);
        }

        return response()->json($query->get());
    }

    /**
     * Store a newly created catalog element.
     */
    public function store(StoreCatalogElementRequest $request): JsonResponse
    {
        $element = CatalogElement::create($request->validated());

        return response()->json($element, 201);
    }

    /**
     * Display the specified catalog element.
     */
    public function show(CatalogElement $catalog_element): JsonResponse
    {
        return response()->json($catalog_element);
    }

    /**
     * Update the specified catalog element.
     */
    public function update(UpdateCatalogElementRequest $request, CatalogElement $catalog_element): JsonResponse
    {
        $data = $request->validated();

        if ($catalog_element->isClean(array_keys($data))) {
            return response()->json(['message' => 'No changes detected'], 200);
        }

        $catalog_element->update($data);

        return response()->json($catalog_element);
    }

    /**
     * Remove the specified catalog element.
     */
    public function destroy(CatalogElement $catalog_element): JsonResponse
    {
        $catalog_element->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }

    /**
     * Get catalog elements by catalog code.
     */
    public function getByCatalogCode(string $code): JsonResponse
    {
        $this->authorize('viewAny', CatalogElement::class);

        /** @var Catalog $catalog */
        $catalog = Catalog::with('elements')->where('code', $code)->firstOrFail();

        return response()->json($catalog->elements);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\UpdateCatalogRequest;
use App\Http\Requests\StoreCatalogRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Catalog;

class CatalogController extends Controller
{
    use AuthorizesRequests;

    /**
     * Constructor
     * Binds the policy to the controller.
     */
    public function __construct()
    {
        $this->authorizeResource(Catalog::class, 'catalog');
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Catalog::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogRequest $request): JsonResponse
    {
        $catalog = Catalog::create($request->validated());

        return response()->json($catalog, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog): JsonResponse
    {
        return response()->json($catalog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogRequest $request, Catalog $catalog): JsonResponse
    {
        $data = $request->validated();

        if ($catalog->isClean(array_keys($data))) {
            return response()->json(['message' => 'No changes detected'], 200);
        }

        $catalog->update($data);

        return response()->json($catalog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog): JsonResponse
    {
        $catalog->delete();

        return response()->json(['message' => 'Deleted successfully'], 204);
    }
}

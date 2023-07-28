<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Services\BrandService;

class BrandController extends Controller
{

    private $service;

    public function __construct(BrandService $brandService)
    {
        $this->service = $brandService;
    }

    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $brands = $this->service->all();

        return BrandResource::collection($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        return $this->service->save($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function index(string $id)
    {
        $brand = $this->service->index($id);

        return BrandResource::make($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        return $this->service->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->service->delete($id);
    }
}

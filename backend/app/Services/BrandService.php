<?php

namespace App\Services;

use App\Repositories\BrandRepository;
use Exception;

class BrandService
{
    private $repository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->repository = $brandRepository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function save($attributes)
    {
        try {
            $this->repository->save($attributes);

            return response()->json(['message' => 'Marca cadastrada com sucesso!'], 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'error' => true], 400);
        }
    }

    public function index($id)
    {
        return $this->repository->find($id);
    }

    public function update($id, $attributes)
    {
        try {
            $this->repository->update($id, $attributes);

            return response()->json(['message' => 'Marca atualizada com sucesso!', 'error' => false]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'error' => true], 400);
        }
    }

    public function delete($id)
    {
        $this->repository->delete($id);

        return response()->json(['message' => 'Marca excluida com sucesso!']);
    }
}

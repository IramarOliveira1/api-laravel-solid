<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Exception;

class ProductService
{
    private $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function save($attributes)
    {
        try {
            $this->repository->save($attributes);

            return response()->json(['message' => 'Produto cadastrada com sucesso!'], 201);
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

            return response()->json(['message' => 'Produto atualizado com sucesso!', 'error' => false]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'error' => true], 400);
        }
    }

    public function delete($id)
    {
        $this->repository->delete($id);

        return response()->json(['message' => 'Produto excluida com sucesso!']);
    }
}

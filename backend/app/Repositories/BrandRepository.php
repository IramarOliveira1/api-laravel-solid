<?php

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository extends GenericRepository
{
    public function __construct(Brand $brand)
    {
        parent::__construct($brand);
    }
}

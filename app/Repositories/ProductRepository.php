<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends AbstractRepository
{

    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function search($param, $n = 5, $url)
    {
        $result =  $this->model->where('name', 'like', '%' . $param . '%')
            ->orWhere('brand', 'like', '%' . $param . '%')
            ->orWhere('details', 'like', '%' . $param . '%')
            ->orWhere('size', 'like', '%' . $param . '%')
            ->simplePaginate($n);
        if($url != null) $result->withPath($url);
        return $result;
    }

    public function findRecentProduct()
    {
        return $this->model->orderBy('updated_at', 'desc')->first();
    }

}
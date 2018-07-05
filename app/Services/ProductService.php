<?php
namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Storage;

class ProductService
{

    private $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function findAllProducts()
    {
        return $this->repository->findAll(50);
    }

    public function countProducts()
    {
        return $this->repository->findAllUnPaged()->count();
    }

    public function findRecentProduct()
    {
        return $this->repository->findRecentProduct();
    }

    /*public function saveProduct($product, $image)
    {
        Storage::disk('public')->putFileAs('', $product->getImageLocation(), $image);
        return $this->repository->save($product);
    }*/

    public function save(Request $request)
    {
        $name = $request->name;
        $brand = $request->brand;
        $categoryId = $request->categoryId;
        $details = $request->details;
        $sellingPrice = $request->sellingPrice;
        $image = $request->file('image');
        $status = $request->status;
        $imageLocation = 'images/products/' .$name .'.jpg';
        $size = $request->size;
        $product = new Product();
        $product->setName($name);
        $product->setBrand($brand);
        $product->setCategoryId($categoryId);
        $product->setDetails($details);
        $product->setSellingPrice($sellingPrice);
        $product->setImageLocation($imageLocation);
        $product->setImageLocation($imageLocation);
        $product->setStatus($status);
        $product->setSize($size);
        Storage::disk('product')->putFileAs('/', $image, $product->getImageLocation());
        return $this->repository->save($product->getAttributesArray());
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $brand = $request->brand;
        $categoryId = $request->categoryId;
        $details = $request->details;
        $sellingPrice = $request->sellingPrice;
        $image = $request->file('image');
        $status = $request->status;
        $imageLocation = 'images/products/' .$name .'.jpg';
        $size = $request->size;
        $product = new Product();
        $product->setName($name);
        $product->setBrand($brand);
        $product->setCategoryId($categoryId);
        $product->setDetails($details);
        $product->setSellingPrice($sellingPrice);
        $product->setImageLocation($imageLocation);
        $product->setImageLocation($imageLocation);
        $product->setStatus($status);
        $product->setSize($size);
        Storage::disk('product')->putFileAs('/', $image, $product->getImageLocation());
        return $this->repository->update($id, $product->getAttributesArray());
    }

    public function findProductsByStatus($status)
    {
        return $this->repository->findByParam('status', $status);
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function findProductByName($name, $size = null)
    {

        return $this->repository->findByParam('name', $name, '/api/products/find?product=' .$name, 30, $size);
    }

    public function findProductBySize($size)
    {
        return $this->repository->findByParam('size', $size, '/api/products/find?size=' .$size, 30);
    }

    public function findProductByCategory($category, $size = null)
    {
        return $this->repository->findByParam('category_id', $category, '/api/products/find?q=' .$category, 30, $size);
    }

    public function searchByParam($param, $url = null)
    {
        return $this->repository->search($param, 30, $url);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
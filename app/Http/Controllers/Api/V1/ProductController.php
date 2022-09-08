<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getAllProducts(): JsonResponse
    {
        $products = $this->productService->getAllProducts();

        return $this->clientJsonResponse($this->successMessage(), $products);
    }

    public function getProduct(Product $product): JsonResponse
    {
        return $this->clientJsonResponse($this->successMessage(), $product);
    }
}

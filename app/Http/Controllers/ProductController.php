<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    protected ProductService $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function processProducts(): View
    {
        $source = request()->query('source') ?? null;

        $this->productService->processImportData($source);

        return view('source.index', ['source' => $source]);
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $r)
    {
        return Product::with(['group','brand','unit'])
            ->when($r->search, fn($q)=>
                $q->where('name','like',"%$r->search%")
                   ->orWhere('barcode','like',"%$r->search%")
                   ->orWhere('sku','like',"%$r->search%")
            )
            ->latest()
            ->paginate($r->rows ?? 10);
    }

    public function store(Request $r)
    {
        return Product::create($r->all());
    }

    public function show(Product $product)
    {
        return $product->load(['group','brand','unit']);
    }

    public function update(Request $r, Product $product)
    {
        $product->update($r->all());
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }

    public function deleteMany(Request $r)
    {
        Product::whereIn('id',$r->ids)->delete();
        return response()->noContent();
    }
}

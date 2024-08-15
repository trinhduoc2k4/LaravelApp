<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() { //get
        $products = Product::get();
        if($products->count() > 0) {
            return ProductResource::collection($products);
        } else return response()->json(['message' => 'No record available'], 200);
    }

    public function store(Request $request) { //create
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandetory',
                'error' => $validator->messages()
            ], 422);
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => new ProductResource($product)
        ], 200);
    }

    public function show(Product $product) { //get by id
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product) { //update
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandetory',
                'error' => $validator->messages()
            ], 422);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product)
        ], 200);
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }

    public function search(Request $request) {
        $name = $request->query('name');
        $price = $request->query('price');


        // $product = Product::where('name', $query_param)->first(); // tra ve 1 kq
        $query = Product::where('name', $name);
        if(!empty($price)) $query->where('price', $price);
        $products = $query->get();
        // $products = Product::where('name', $name)
        //             ->where('price', $price)
        //             ->get(); // tra ve nhieu kq
        if($products) {
            return response()->json([
                'message' => 'Seach successfully',
                'data' => ProductResource::collection($products)
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }
}

<?php

namespace App\Http\Controllers\Api\Categories;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index() {
        $product = Products::all();

        if($product->count() > 0 ) {

        return response()->json([
            'status' => 200,
            'products' => $product
        ], 200);

        } else {
            $errormessage = "Product Not Found!";
            return response()->json([
                'status' => 404,
                'products' => $errormessage
            ], 404);
        }
    }

    public function create(Request $request) {
        $product = Products::create();

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:20',
            'product_type' => 'required|string|max:20',
            'product_description' => 'string|max:16000'
        ]);

        if($validator->fails()) {
            return response() -> json([
                'status' => 422,
                'products' => $validator->messages()
            ], 422);
        } else {

            $product = Products::create([
                'product_name' => $request->product_name,
                'product_type' => $request->product_type,
                'product_description' => $request->product_description
            ]);

            if ($product) {
                $createdmsg = "Product Added Successfully!";
                return response()->json([
                    'status' => 200,
                    'products' => $createdmsg
                ], 200);
            } else {
                $notcreatedmsg = "Product NOT Added Successfully!";
                return response()->json([
                    'status' => 500,
                    'products' => $notcreatedmsg
                ], 500);
            }
        }
    }

    public function getbyId($id) {
        $product = Product::find($id);

        if($product) {
            return response()->json([
                'status' => 200,
                'products' => $product
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'products' => $product
            ], 500);
        }
    }


}
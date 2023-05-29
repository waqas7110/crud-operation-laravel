<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index() {
        return view( 'products.index', [ 'products'=>Product::paginate( 3 ) ] );
    }

    public function create() {
        return view( 'products.create' );
    }

    public function store( Request $request ) {
        //form validation//
        $request->validate( [
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:100000'
        ] );

        //image upload//
        $imageName = time().'.'.$request->image->extension();
        $request->image->move( public_path( 'products' ), $imageName );

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess( 'Product created successfully' );
    }

    public function edit( $id ) {
        $product = Product::where( 'id', $id )->first();
        return view( 'products.edit', [ 'product'=>$product ] );

    }

    public function update( Request $request, $id ) {
        //form validation//
        $request->validate( [
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpg,jpeg,png,gif|max:100000'

        ] );
        $product = Product::where( 'id', $id )->first();
        //image upload//
        if ( isset( $request->image ) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move( public_path( 'products' ), $imageName );
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess( 'Product update successfully' );

    }

    public function destroy( $id ) {
        $product = Product::where( 'id', $id )->first();
        $product->delete();
        return back()->withSuccess( 'Product delete successfully' );
    }

    public function show( $id ) {
        $product = Product::where( 'id', $id )->first();

        return view( 'products.show', [ 'product'=>$product ] );
    }
}
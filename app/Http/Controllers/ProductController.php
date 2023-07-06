<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);

        return view('pages.product.actions.list', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product.actions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = str_replace(',', '.', $product->price);
        $product->barCode = $request->barCode;
        $product->status = 0;

        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('pages.product.actions.edit', compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = str_replace(',', '.', $product->price);
        $product->barCode = $request->barCode;
        $product->promotion = $request->promotion;

        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDestroy(Request $request)
    {
        Product::destroy($request->ids);

        return redirect()->route('product.index');
    }

    /**
     * Show the form for bulk deleting resources.
     */
    public function showBulkDelete()
    {
        $products = Product::all();

        return view('pages.product.actions.bulk-delete', compact(['products']));
    }
}

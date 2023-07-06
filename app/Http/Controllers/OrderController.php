<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(5);

        return view('pages.order.actions.list', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.order.actions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order;

        $cpf = $request->cpf;
        $product_id = $request->product_id;

        $product = Product::where('id', $product_id)->first();
        $client = Client::where('cpf', $cpf)->first();

        $order->quantity = $request->quantity;
        $order->order_value = $product->price * $request->quantity;
        $order->order_date = $request->order_date;
        $order->status = $request->status;
        $order->order_number = rand();

        $order->client()->associate($client);
        $order->product()->associate($product);

        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('pages.order.actions.details', compact(['order']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('pages.order.actions.edit', compact("order"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $cpf = $request->cpf;
        $product_id = $request->product_id;

        $product = Product::where('id', $product_id)->first();
        $client = Client::where('cpf', $cpf)->first();

        $order->quantity = $request->quantity;
        $order->order_value = $product->price * $request->quantity;
        $order->order_date = $request->order_date;
        $order->order_number = rand();

        $order->client()->associate($client);
        $order->product()->associate($product);

        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDestroy(Request $request)
    {
        Order::destroy($request->ids);

        return redirect()->route('order.index');
    }

    /**
     * Show the form for bulk deleting resources.
     */
    public function showBulkDelete()
    {
        $orders = Order::all();

        return view('pages.order.actions.bulk-delete', compact(['orders']));
    }
}

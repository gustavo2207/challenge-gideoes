<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(5);
        // $clients = [];

        return view('pages.client.actions.list', compact(["clients"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.client.actions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->cpf = $request->cpf;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find($id);

        return view('pages.client.actions.edit', compact("client"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $client->name = $request->name;
        $client->cpf = $request->cpf;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDestroy(Request $request)
    {
        Client::destroy($request->ids);

        return redirect()->route('client.index');
    }

    /**
     * Show the form for bulk deleting resources.
     */
    public function showBulkDelete()
    {
        $clients = Client::all();

        return view('pages.client.actions.bulk-delete', compact(['clients']));
    }
}

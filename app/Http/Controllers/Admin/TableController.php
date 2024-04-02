<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {
        if ($request->guest_number > 3) {

            Alert::warning('Number of Guests exceeds the limit. Please input between 1 to 3 guests.');
            return back();
        }
        
         Table::create([
            'name' => $request->name,
            'price' => $request->price,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
         ]);

         Alert::success('Table created successfully.');
         return to_route('admin.tables.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update($request->validated());

        Alert::success('Table updated successfully.');
        return to_route('admin.tables.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        $table->reservation()->delete();


        Alert::error('Table has been deleted.');
        return to_route('admin.tables.index');
    }
}

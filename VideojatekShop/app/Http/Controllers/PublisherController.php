<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use Illuminate\Auth\Middleware\Authorize;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view("publishers.index", ['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("publishers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        $publisher = new Publisher(
            [
                "name" => $request->name
            ]
        );

        $publisher->save();

        return back()->with("success", "Publisher created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view("publishers.edit", ['publisher' => $publisher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->all());

        return redirect()->route('publishers.index')->with('success', 'The publisher was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return back()->with("success","Sikeres Törlés");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewIndex', Platform::class);
        $platforms = Platform::all();
        return view("platforms.index", ['platforms' => $platforms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("platforms.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatformRequest $request)
    {
        $this->authorize('create', Platform::class);
        $platform = new Platform(
            [
                "name" => $request->name,
                "created_by" => Auth::user()->id,
            ]
        );

        $platform->save();

        return back()->with("success", "Hozzáadtad a platformot.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Platform $platform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platform $platform)
    {
        return view("platforms.edit", ['platform' => $platform]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatformRequest $request, Platform $platform)
    {
        $this->authorize('update', Platform::class);
        $platform->updated_by = Auth::user()->id;
        $platform->update($request->all());

        return redirect()->route('platforms.index')->with('success', 'A platformot módosítottad.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platform $platform)
    {
        $this->authorize('delete', Platform::class);
        $platform->deleted_by = Auth::user()->id;
        $platform->update();
        $platform->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_platforms = Platform::onlyTrashed()->get();
        return view('platforms.show_deleted', ['platforms' => $deleted_platforms]);
    }

    public function restore(Platform $platform)
    {
        $this->authorize('restore', Platform::class);
        $platform->restore();
        return back()->with('success', 'Visszaállítottad a platformot.');
    }
}

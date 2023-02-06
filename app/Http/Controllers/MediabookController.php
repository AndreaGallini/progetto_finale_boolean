<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediabookRequest;
use App\Http\Requests\UpdateMediabookRequest;
use App\Models\Mediabook;

class MediabookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $media = Mediabook::all();
        return view('admin.mediabook.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.mediabook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMediabookRequest  $request
     *
     */
    public function store(StoreMediabookRequest $request)
    {
        $data = $request->validated();
        $slug = Mediabook::generateSlug($request->name);
        $data['slug'] = $slug;
        $new_mediabook = Mediabook::create($data);
        return redirect()->route('admin.mediabook.index')->with('message',"$new_mediabook->name aggiunto con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mediabook  $mediabook
     *
     */
    public function show(Mediabook $mediabook)
    {
        return view('admin.mediabook.show', compact('mediabook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mediabook  $mediabook
     *
     */
    public function edit(Mediabook $mediabook)
    {
        return view('admin.mediabook.edit', compact('mediabook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMediabookRequest  $request
     * @param  \App\Models\Mediabook  $mediabook
     *
     */
    public function update(UpdateMediabookRequest $request, Mediabook $mediabook)
    {
        $data = $request->validated();
        $slug = Mediabook::generateSlug($request->name);
        $data['slug'] = $slug;
        $mediabook->update($data);
        return redirect()->route('admin.mediabook.index')->with('message', "$mediabook->name aggiornato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mediabook  $mediabook
     *
     */
    public function destroy(Mediabook $mediabook)
    {
        $mediabook->delete();
        return redirect()->route('admin.mediabook.index')->with('message', "$mediabook->name cancellato con successo");
    }
}

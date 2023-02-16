<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Sponsor;
use App\Models\Apartment;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $userId = Auth::id();
        $sponsors = Sponsor::all();
        $apartments = Apartment::where('user_id', $userId)->get();
        return view('admin.sponsors.index', compact('sponsors', 'apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSponsorRequest  $request
     *
     */
    public function store(StoreSponsorRequest $request)
    {
        $data = $request->validated();
        $slug = Sponsor::generateSlug($request->name);
        $data['slug'] = $slug;

        Sponsor::create($data);

        return redirect()->back()->with('message', "Sponsor $slug added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     *
     */
    // public function show(Sponsor $sponsor)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     *
     */
    // public function edit(Sponsor $sponsor)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorRequest  $request
     * @param  \App\Models\Sponsor  $sponsor
     *
     */
    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $data = $request->validated();
        $slug = Sponsor::generateSlug($request->name);
        $data['slug'] = $slug;
        $sponsor->update($data);

        return redirect()->back()->with('message', "Sponsor $slug updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     *
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->back()->with('message', "Sponsor $sponsor->name removed successfully");
    }
}
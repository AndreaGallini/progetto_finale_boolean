<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Apartment;
use App\Models\Category;
use App\Models\Mediabook;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Stat;

use Illuminate\Support\Facades\Storage;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $apartments = Apartment::all();
            return view('admin.apartments.index', compact('apartments'));
        } else {
            $apartments = Apartment::paginate(3);
            return view('admin.apartments.index', compact('apartments'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $apartments = Apartment::all();
        $categories = Category::all();
        $services = Service::all();
        $sponsors = Sponsor::all();

        return view('admin.apartments.create', compact('apartments', 'categories', 'services', 'sponsors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     *
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->validated();
        $userid = Auth::id();

        $slug = Apartment::generateSlug($request->title);
        $data['user_id'] = $userid;
        $data['slug'] = $slug;

        if ($request->hasFile('cover_img')) {
            $path = Storage::disk('public')->put('images', $request->cover_img);
            $data['cover_img'] = $path;
        }
        $newApartment = Apartment::create($data);

        if ($request->has('sponsors')) {
            $newApartment->sponsors()->attach($request->sponsors);
        }
        if ($request->has('services')) {
            $newApartment->services()->attach($request->services);
        }
        return redirect()->route('admin.apartments.index', $newApartment->slug)->with('message', "La creazione di $newApartment->title è andata a buon fine!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     *
     */
    public function show(Apartment $apartment)
    {
        if (!Auth::user()->isAdmin() && $apartment->user_id !== Auth::id()) {
            abort(403);
        }
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     *
     */
    public function edit(Apartment $apartment)
    {
        if (!Auth::user()->isAdmin() && $apartment->user_id !== Auth::id()) {
            abort(403);
        }
        $apartments = Apartment::all();
        $categories = Category::all();
        $mediabooks = Mediabook::all();
        $services = Service::all();
        $sponsors = Sponsor::all();
        return view('admin.apartments.edit', compact('apartment', 'categories', 'mediabooks', 'services', 'sponsors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     *
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        // dd($request);
        if (!Auth::user()->isAdmin() && $apartment->user_id !== Auth::id()) {
            abort(403);
        }
        $data = $request->validated();
        $slug = Apartment::generateSlug($request->title);
        $data['slug'] = $slug;
        if ($request->hasFile('cover_img')) {
            if ($apartment->cover_img) {
                Storage::delete($apartment->cover_img);
            }
            $path = Storage::disk('public')->put('apartment_image', $request->cover_img);
            $data['cover_img'] = $path;
        }
        $apartment->update($data);

        if ($request->has('services')) {
            $apartment->services()->sync($request->services);
        } else {
            $apartment->services()->sync([]);
        }

        if ($request->has('sponsors')) {
            $apartment->sponsors()->sync($request->sponsors);
        } else {
            $apartment->sponsors()->sync([]);
        }
        return redirect()->route('admin.apartments.index')->with('message', "$apartment->title aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     *
     */
    public function destroy(Apartment $apartment)
    {
        if (!Auth::user()->isAdmin() && $apartment->user_id !== Auth::id()) {
            abort(403);
        }
        $apartment->delete();
        return redirect()->route('admin.apartments.index')->with('message', "$apartment->title cancellato");
    }
}

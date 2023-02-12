<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $services = Service::all();
            return view('admin.services.index', compact('services'));
        }
        abort(403);


    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    // public function create()
    // {
    //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     *
     */
    public function store(StoreServiceRequest $request)
    {
        if (Auth::user()->isAdmin()) {
            $data = $request->validated();
            $slug = Service::generateSlug($request->title);
            $data['slug'] = $slug;

            Service::create($data);
            return redirect()->back()->with('message', "$slug aggiunto con successo");
        }
        abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     *
     */
    // public function show(Service $service)
    // {
    //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     *
     */
    // public function edit(Service $service)
    // {
    //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     *
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        if (Auth::user()->isAdmin()) {
            $data = $request->validated();
            $slug = Service::generateSlug($request->title);
            $data['slug'] = $slug;

            $service->update($data);
            return redirect()->back()->with('message', "$service->title aggiornato con successo");
        }

        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     *
     */
    public function destroy(Service $service)
    {
        if (Auth::user()->isAdmin()) {
            $service->delete();
            return redirect()->back()->with('message', "$service->title cancellato con successo");
        }
        abort(403);
    }
}
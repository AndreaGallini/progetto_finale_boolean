<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     *
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        $slug = Service::generateSlug($request->name);
        $data['slug'] = $slug;
        $new_service = Service::create($data);
        return redirect()->route('admin.services.index')->with('message',"$new_service->name aggiunto con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     *
     */
    public function show(Service $service)
    {
                return view('admin.services.show', compact('service'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     *
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     *
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
                $data = $request->validated();
        $slug = Service::generateSlug($request->name);
        $data['slug'] = $slug;
        $service->update($data);
        return redirect()->route('admin.services.index')->with('message', "$service->name aggiornato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     *
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('message',"$service->name cancellato con successo");
    }
}

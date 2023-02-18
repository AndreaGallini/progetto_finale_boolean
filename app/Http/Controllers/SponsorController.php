<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Sponsor;
use App\Models\Apartment;
use Illuminate\Http\Request;


class SponsorController extends Controller
{

    public function checkout(Request $request)
    {

        if ($request->has('hidWeek')) {
            $apartment = Apartment::where('id', $request->hidWeek)->get()->first();
        }
        if ($request->has('hidMonth')) {
            $apartment = Apartment::where('id', $request->hidMonth)->get()->first();
        }
        if ($request->has('hidYear')) {
            $apartment = Apartment::where('id', $request->hidYear)->get()->first();
        }

        $sponsor = Sponsor::where('id', $request->sponsor)->get()->first();

        return view('admin.sponsors.checkout', compact('apartment', 'sponsor'));
    }

    public function pay(Request $request)
    {
        if($request->payment_method_nonce){
            $gateway = new \Braintree\Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'j9pykhw8fynn6t4g',
                'publicKey' => 'w6qjwdpqqr652vbq',
                'privateKey' => 'ebe8a9f39e2fd7bf01730e3cef0ae694'
            ]);

            $result = $gateway->transaction()->sale([
                'amount' => '10.00',
                'paymentMethodNonce' => $request->payment_method_nonce,
                'options' => [
                  'submitForSettlement' => True
                ]
              ]);
            if($result->success){
                if ($request->has('sponsor_id')) {
                    $apartment = Apartment::where('id', $request->apartment_id)->get()->first();
                }
                $sponsor = Sponsor::where('id', $request->sponsor_id)->get()->first();
                return view('admin.sponsors.paypage', compact('apartment', 'sponsor'));
            }else{
                abort(403);
            }
        }else{
            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $userId = Auth::id();
        $sponsors = Sponsor::all();
        $apartments = Apartment::where('user_id', $userId)->with('sponsors')->get();
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
    public function store(Request $request)
    {
        $userId = Auth::id();
        $sponsors = Sponsor::all();
        $apartments = Apartment::where('user_id', $userId)->get();

        $sponsorId = [$request->sponsor_id];


        $apartmentId = $request->apartment_id;

        $apartmentToUpdate = Apartment::with('sponsors')->where('id', $apartmentId)->get();
        $apartmentToUpdate[0]->sponsors()->attach($sponsorId);

        return view('admin.apartments.index', compact('sponsors', 'apartments'));
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

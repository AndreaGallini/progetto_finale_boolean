<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewContact;

use App\Models\Lead;
use App\Models\Apartment;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class LeadController extends Controller
{
    public function index(Apartment $apartment){
        // if ($apartment->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        //     abort(403);
        // }

        // dd($apartment);

        return view('emails.inbox', compact('apartment'));
    }
    public function store(Request $request){
        $data = $request->all();
        $newMail = new Lead();
        $newMail->fill($data);
        $newMail->save();

        Mail::to('andreagallini01@gmail.com')->send(new NewContact($newMail));

        return response()->json([
            'success' => true
        ]);
    }
}

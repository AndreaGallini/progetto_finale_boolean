<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use App\Models\Apartment;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class LeadController extends Controller
{

    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $apartments = Apartment::all();
        } else {
            $userId = Auth::id();
            $apartments = Apartment::where('user_id', $userId)->get();
        }


        $users = User::all();
        return view('emails.inbox', compact('apartments'));
    }
    public function showMails(Apartment $apartment)
    {
        // if ($apartment->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        //     abort(403);
        // }

        // dd($apartment);

        return view('emails.show-inbox', compact('apartment'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'errors' => $validator->errors()
            ]);
        }
        $newMail = new Lead();
        $newMail->fill($data);
        $newMail->save();

        Mail::to('andreagallini01@gmail.com')->send(new NewContact($newMail));

        return response()->json([
            'success' => true
        ]);
    }
    public function testform()
    {
        return view('emails.new-contact-email');
    }
}
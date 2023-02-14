<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'apartment_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('utente-non-registrato@contact.it')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}

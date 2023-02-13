<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nome' => 'required',
            'email' => 'required',
            'messaggio' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }
        $new_lead = new Lead();
        $new_lead = Lead::create($data);

        Mail::to('andreagallini01@gmail.com')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
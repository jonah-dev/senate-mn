<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSenatorRequest;
use App\Mail\SenatorContacted;
use App\Models\Senator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactSenatorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactSenatorRequest $request)
    {
        $validated = $request->validated();

        $mail = new SenatorContacted(
            senator: Senator::where('senator_id', $validated->senator_id)->first(),
            senderLastName: $validated->last_name,
            senderEmail: $validated->email,
            message: $validated->message
        );

        Mail::to($request->email)->queue($mail);

        return response()->json([
            'message' => 'Email sent successfully!'
        ]);
    }
}

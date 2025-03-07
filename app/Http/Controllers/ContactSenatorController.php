<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSenatorRequest;
use App\Mail\SenatorContacted;
use App\Models\Senator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactSenatorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactSenatorRequest $request)
    {
        $validated = $request->validated();

        $senator = Senator::where('senator_id', $validated['senator_id'])->first();

        $mail = new SenatorContacted(
            senator: $senator,
            senderLastName: $validated['sender_last_name'],
            senderEmail: $validated['sender_email'],
            body: $validated['message']
        );

        Mail::to($senator->email)->queue($mail);

        return Redirect::back()->with('message', 'Your message has been sent!');
    }
}

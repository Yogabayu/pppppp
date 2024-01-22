<?php

namespace App\Http\Controllers;

use App\Models\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactme(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email'   => 'required',
            'message' => 'required',
        ]);

        $contact = new ContactMe;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;

        Mail::send('components.contact', ['name' => $request->name, 'email' => $request->email, 'messages' => $request->message,],  function ($message) use ($request) {
            // $message->from('pengaduan@bankarthaya.com', 'Administrator');
            $message->to($request->email, 'Admin');
            $message->subject('Contact Email');
        });

        return redirect()->back()->with('success', 'Berhasil mengirim pesan');
    }
}

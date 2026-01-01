<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show contact page
    public function index()
    {
        return view('contact');
    }

    // Handle form submit
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->only('name', 'email', 'message'));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}

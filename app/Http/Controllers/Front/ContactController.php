<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show Contact Page
    public function contact()
    {
        return view('Front.contact');
    }

    // Store Contact Form Data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    // Show Contact Messages in Admin Panel
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('Admin.contacts.index', compact('contacts'));
    }

    // Delete Contact Message
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}


<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot spam check: real visitors never see or fill this field.
        if ($request->filled('website')) {
            return response()->json(['success' => true, 'message' => 'Your message has been submitted successfully!']);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Loose international format: optional leading +, digits/spaces/
            // dashes/parens only, 7-20 chars — covers real-world numbers from
            // any country without needing a full phone-number library.
            'phone_number' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s\-\(\)]{7,20}$/'],
            'msg_subject' => 'required|string|max:255',
            'message' => 'required|string',
            'grid_check' => 'required|accepted',
        ], [
            'phone_number.regex' => 'Please enter a valid phone number.',
        ]);

        Contact::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Your message has been submitted successfully!']);
    }
}
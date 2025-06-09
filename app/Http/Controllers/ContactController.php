<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'msg_subject' => 'required|string|max:255',
            'message' => 'required|string',
            'grid_check' => 'required|accepted',
        ]);

        Contact::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Your message has been submitted successfully!']);
    }
}
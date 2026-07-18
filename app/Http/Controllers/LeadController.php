<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leadsByStatus = Contact::latest()->get()->groupBy('status');

        return view('admin.leads.index', [
            'statuses' => Contact::STATUSES,
            'leadsByStatus' => $leadsByStatus,
        ]);
    }

    public function create()
    {
        return view('admin.leads.create', ['statuses' => Contact::STATUSES]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'msg_subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|in:'.implode(',', Contact::STATUSES),
            'notes' => 'nullable|string',
        ]);
        $validated['grid_check'] = true;

        Contact::create($validated);

        return redirect()->route('admin.leads.index')->with('status', 'Lead created successfully.');
    }

    public function show(Contact $lead)
    {
        return view('admin.leads.show', ['lead' => $lead]);
    }

    public function update(Request $request, Contact $lead)
    {
        $validated = $request->validate([
            'status' => 'required|in:'.implode(',', Contact::STATUSES),
            'notes' => 'nullable|string',
        ]);

        $lead->update($validated);

        return redirect()->route('admin.leads.show', $lead)->with('status', 'Lead updated successfully.');
    }

    /**
     * AJAX endpoint used by the Kanban board's drag-and-drop to move a lead
     * between status columns without a full page reload.
     */
    public function move(Request $request, Contact $lead)
    {
        $validated = $request->validate([
            'status' => 'required|in:'.implode(',', Contact::STATUSES),
        ]);

        $lead->update(['status' => $validated['status']]);

        return response()->json(['success' => true]);
    }

    public function destroy(Contact $lead)
    {
        $lead->delete();

        return back()->with('status', 'Lead deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Event;
class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        // Fetch all events from the database
        $events = Event::all();

        // Check if event_title is passed in the query string and find the event
        $selectedEventTitle = $request->query('event_title', null);

        // Find the event corresponding to the passed event title
        $selectedEvent = $events->firstWhere('name', $selectedEventTitle);

        return view('registrations.create', compact('events', 'selectedEvent'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'event_id' => 'required|exists:events,id', // Ensure event_id is valid
        ]);

        // Store the registration
        $registration = new Registration();
        $registration->name = $validated['name'];
        $registration->email = $validated['email'];
        $registration->event_id = $validated['event_id']; // Make sure to set event_id

        $registration->save();

        // Redirect to the events management page after successful registration
        return redirect('http://localhost/event/eventmanagement/events/')->with('success', 'Registration successful!');
    }

    // public function index()
    // {
    //     $registrations = Registration::with('event')->get();
    //     return view('admin.index', compact('index'));
    // }
    public function index()
    {
        $registrations = Registration::with('event')->get();
        return view('admin.index', compact('registrations')); // Fix here
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display a listing of events with pagination
    public function index()
    {
        $events = Event::latest()->paginate(10); // Paginate to reduce load on admin panel
        return view('events.index', compact('events'));
    }

    // Show form for creating a new event
    public function create()
    {
        return view('events.create');
    }

    // Store a newly created event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date|date_format:Y-m-d\TH:i',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    // Show form for editing an existing event
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    // Update the specified event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Delete the specified event
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

    // Display details of a single event (useful for WordPress integration)
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // API endpoint to fetch all events in JSON format for WordPress integration
    public function apiIndex()
    {
        $events = Event::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'name' => $event->name,
                'event_date' => $event->event_date->format('Y-m-d H:i:s'),
                'location' => $event->location,
                'description' => $event->description,
                'url' => route('events.show', $event->id),
            ];
        });

        return response()->json($events);
    }


}

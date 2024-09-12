<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Fetch all events
    public function index()
    {
        $events = Event::all();  // Retrieve all events
        return response()->json($events, 200);  // Return the events in JSON format
    }

    // Create a new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'time' => 'required',
            'date' => 'required|date',
            'venue' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);

        $event = Event::create($validated);  // Create a new event using validated data
        return response()->json($event, 201);  // Return the created event in JSON format
    }

    // Fetch a specific event by ID
    public function show($id)
    {
        $event = Event::find($id);  // Find an event by ID
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);  // Return error if not found
        }
        return response()->json($event, 200);  // Return the event in JSON format
    }

    // Update an event
    public function update(Request $request, $id)
    {
        $event = Event::find($id);  // Find an event by ID
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);  // Return error if not found
        }

        $validated = $request->validate([
            'time' => 'required',
            'date' => 'required|date',
            'venue' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);

        $event->update($validated);  // Update the event with the validated data
        return response()->json($event, 200);  // Return the updated event
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::find($id);  // Find an event by ID
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);  // Return error if not found
        }

        $event->delete();  // Delete the event
        return response()->json(['message' => 'Event deleted'], 200);  // Return success message
    }
}

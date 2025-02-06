@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
  <h2 class="text-2xl font-semibold mb-6">Create Event</h2>

  <form action="{{ route('events.store') }}" method="POST">
    @csrf
    <div class="mb-4">
      <label for="name" class="block text-gray-700">Event Name:</label>
      <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg" required>
    </div>
    <div class="mb-4">
      <label for="event_date" class="block text-gray-700">Event Date:</label>
      <input type="datetime-local" name="event_date" id="event_date"
        class="w-full p-3 border border-gray-300 rounded-lg"
        value="{{ old('event_date', now()->format('Y-m-d\TH:i')) }}" required>


    </div>
    <div class="mb-4">
      <label for="location" class="block text-gray-700">Location:</label>
      <input type="text" name="location" id="location" class="w-full p-3 border border-gray-300 rounded-lg" required>
    </div>
    <div class="mb-4">
      <label for="description" class="block text-gray-700">Description:</label>
      <textarea name="description" id="description" class="w-full p-3 border border-gray-300 rounded-lg"
        required></textarea>
    </div>
    <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition">Create
      Event</button>
  </form>
</div>
@endsection
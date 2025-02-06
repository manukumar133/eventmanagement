@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-lg">
  <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Edit Event</h2>

  <form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-6">
      <label for="name" class="block text-lg font-semibold text-gray-700">Event Name:</label>
      <input type="text" name="name" id="name" value="{{ $event->name }}"
        class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
    </div>

    <div class="mb-6">
      <label for="event_date" class="block text-lg font-semibold text-gray-700">Event Date:</label>
      <input type="datetime-local" name="event_date" id="event_date"
        value="{{ $event->event_date->format('Y-m-d\TH:i') }}"
        class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
    </div>

    <div class="mb-6">
      <label for="location" class="block text-lg font-semibold text-gray-700">Location:</label>
      <input type="text" name="location" id="location" value="{{ $event->location }}"
        class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
    </div>

    <div class="mb-6">
      <label for="description" class="block text-lg font-semibold text-gray-700">Description:</label>
      <textarea name="description" id="description"
        class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>{{ $event->description }}</textarea>
    </div>

    <button type="submit"
      class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition duration-200">Update
      Event</button>
  </form>
</div>
@endsection
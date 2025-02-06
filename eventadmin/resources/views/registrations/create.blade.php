@extends('layouts.app')

@section('content')
<div
  class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 px-4">
  <div class="w-full max-w-lg bg-white/10 backdrop-blur-lg shadow-2xl rounded-xl p-8 border border-white/20">
    <h2 class="text-3xl font-bold text-white text-center mb-6">Register for an Event</h2>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-600 text-white text-center rounded-lg shadow-md">
      {{ session('success') }}
    </div>
  @endif

    <form action="{{ route('registrations.store') }}" method="POST" class="space-y-6">
      @csrf
      <div>
        <label class="text-white block text-sm font-medium mb-2">Full Name</label>
        <input type="text" name="name"
          class="w-full px-4 py-2 rounded-lg bg-white/10 text-gray-900 placeholder-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all"
          placeholder="Enter your name" required>
      </div>

      <div>
        <label class="text-white block text-sm font-medium mb-2">Email Address</label>
        <input type="email" name="email"
          class="w-full px-4 py-2 rounded-lg bg-white/10 text-gray-900 placeholder-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all"
          placeholder="Enter your email" required>
      </div>

      <div>
        <label class="text-white block text-sm font-medium mb-2">Select Event Title</label>
        <select name="event_id"
          class="w-full px-4 py-2 rounded-lg bg-white/10 text-gray-900 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all"
          required>
          <option value="" class="text-gray-300">-- Select an Event --</option>
          @foreach($events as $event)
        <option value="{{ $event->id }}" class="text-black" {{ isset($selectedEvent) && $selectedEvent->id == $event->id ? 'selected' : '' }}>
        {{ $event->name }} ({{ $event->event_date }})
        </option>
      @endforeach
        </select>

      </div>

      <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
        Register Now
      </button>
    </form>
  </div>
</div>
@endsection
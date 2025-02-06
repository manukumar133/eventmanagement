@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-xl shadow-lg">
  <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Laravel Admin Panel</h2>

  <div class="flex justify-between mb-6">
    <div>
      <a href="{{ route('events.create') }}"
        class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-200 ease-in-out text-xl">Create
        Event</a>
      <a href="{{ route('registrations.index') }}"
        class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-200 ease-in-out text-xl">
        View Registrations
      </a>

    </div>

    <!-- Logout Button -->

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit"
        class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-200 ease-in-out text-xl">
        Logout
      </button>
    </form>

  </div>

  @if (session('success'))
    <div class="mb-4 p-3 bg-green-500 text-white rounded-lg text-center font-semibold">{{ session('success') }}</div>
  @endif

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($events as $event)
    <div class="bg-white p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300">
      <h3 class="text-2xl font-bold text-indigo-600">{{ $event->name }}</h3>
      <p class="text-gray-500 text-sm mb-2">{{ $event->event_date->format('l, F j, Y \o\f h:i A') }}</p>
      <p class="text-gray-600">{{ $event->location }}</p>
      <p class="text-gray-700 mt-2">{{ \Str::limit($event->description, 100) }}</p>

      <div class="mt-4 flex justify-between items-center">
      <a href="{{ route('events.edit', $event->id) }}"
        class="text-indigo-600 hover:text-indigo-800 font-semibold">Edit</a>
      <form action="{{ route('events.destroy', $event->id) }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this event?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
      </form>
      </div>
    </div>
  @endforeach
  </div>
</div>
@endsection
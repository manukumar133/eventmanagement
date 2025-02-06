@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-lg">
  <h2 class="text-3xl font-semibold text-center text-indigo-600 mb-6">Registrations List</h2>

  <div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="w-full table-auto border-collapse">
      <thead>
        <tr class="bg-indigo-600 text-white uppercase text-sm leading-normal">
          <th class="py-3 px-6 text-left">Name</th>
          <th class="py-3 px-6 text-left">Email</th>
          <th class="py-3 px-6 text-left">Event Name</th>
          <th class="py-3 px-6 text-left">Registered At</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 text-sm font-light">
        @foreach ($registrations as $registration)
      <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
        <td class="py-3 px-6">{{ $registration->name }}</td>
        <td class="py-3 px-6">{{ $registration->email }}</td>
        <td class="py-3 px-6">{{ $registration->event ? $registration->event->name : 'N/A' }}</td>
        <td class="py-3 px-6">{{ $registration->created_at->format('d M Y h:i A') }}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
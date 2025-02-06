@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
  <h2 class="text-3xl font-bold text-center mb-6">Registered Users</h2>

  <div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="w-full table-auto border-collapse">
      <thead class="bg-indigo-600 text-white">
        <tr class="text-sm leading-normal">
          <th class="py-3 px-6 text-left">#</th>
          <th class="py-3 px-6 text-left">Full Name</th>
          <th class="py-3 px-6 text-left">Email</th>
          <th class="py-3 px-6 text-left">Event Name</th>
          <th class="py-3 px-6 text-left">Event Date</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 text-sm font-light">
        @foreach($registrations as $index => $registration)
      <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
        <td class="py-3 px-6">{{ $index + 1 }}</td>
        <td class="py-3 px-6">{{ $registration->name }}</td>
        <td class="py-3 px-6">{{ $registration->email }}</td>
        <td class="py-3 px-6">{{ $registration->event->name ?? 'N/A' }}</td>
        <td class="py-3 px-6">{{ $registration->event->event_date ?? 'N/A' }}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Details - {{ $event->name }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="max-w-3xl w-full bg-white shadow-lg rounded-lg p-6">
    @if ($event->image)
    <img src="{{ $event->image }}" class="w-full h-64 object-cover rounded-lg mb-4" alt="{{ $event->name }}">
  @endif
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $event->name }}</h1>

    <div class="text-gray-600">
      <p class="mb-2"><strong>Date:</strong> {{ $event->event_date }}</p>
      <p class="mb-2"><strong>Location:</strong> {{ $event->location }}</p>
      <p class="mb-4"><strong>Description:</strong> {{ $event->description }}</p>
    </div>

    <a href="http://localhost/event/eventmanagement/events/"
      class="inline-block mt-4 px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
      ← Go to events
    </a>
  </div>
</body>

</html>
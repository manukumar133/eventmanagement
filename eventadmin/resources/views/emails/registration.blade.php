<!DOCTYPE html>
<html>

<head>
  <title>Event Registration Confirmation</title>
</head>

<body>
  <h2>Thank you for registering, {{ $registration->name }}!</h2>
  <p>You have successfully registered for the event <strong>{{ $registration->event->name }}</strong>.</p>
  <p><strong>Date & Time:</strong> {{ $registration->event->event_date }}</p>
  <p><strong>Location:</strong> {{ $registration->event->location }}</p>
  <p>Looking forward to seeing you at the event!</p>
</body>

</html>
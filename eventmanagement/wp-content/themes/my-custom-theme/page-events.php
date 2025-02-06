<?php
get_header();
$events = fetch_events_from_laravel();
?>
<div class="container">
  <h1>Upcoming Events</h1>
  <?php foreach ($events as $event): ?>
    <div>
      <h2><?php echo $event['name']; ?></h2>
      <p><?php echo $event['description']; ?></p>
      <a href="/register?event_id=<?php echo $event['id']; ?>">Register</a>
    </div>
  <?php endforeach; ?>
</div>
<?php get_footer(); ?>
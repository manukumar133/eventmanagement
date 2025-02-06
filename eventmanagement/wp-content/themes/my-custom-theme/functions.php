<?php
function my_theme_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'my-custom-theme'),
  ));
}
add_action('after_setup_theme', 'my_theme_setup');

function my_theme_scripts()
{
  wp_enqueue_style('tailwind-css', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
  wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

function custom_post_type_events()
{
  register_post_type(
    'events',
    array(
      'labels' => array(
        'name' => __('Events'),
        'singular_name' => __('Event')
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-calendar',
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
      'rewrite' => array(
        'slug' => 'events',
        'with_front' => false,
      ),
    )
  );
}
add_action('init', 'custom_post_type_events');

function flush_rewrite_rules_on_activation()
{
  custom_post_type_events();
  flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_rewrite_rules_on_activation');

/**
 * Fetch events from Laravel API.
 */
function get_laravel_events()
{
  $api_url = 'http://localhost:8000/api/events';
  $response = wp_remote_get($api_url, array('timeout' => 10));

  if (is_wp_error($response)) {
    error_log('Failed to load Laravel events: ' . $response->get_error_message());
    return [];
  }

  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body, true);

  if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('JSON Decode Error: ' . json_last_error_msg());
    return [];
  }

  return !empty($data) ? $data : [];
}

/**
 * Fetch event registrations from Laravel API.
 */
function get_laravel_event_registrations()
{
  $api_url = 'http://localhost:8000/api/event-registrations';
  $response = wp_remote_get($api_url, array('timeout' => 10));

  if (is_wp_error($response)) {
    error_log('Failed to load event registrations: ' . $response->get_error_message());
    return [];
  }

  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body, true);

  if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('JSON Decode Error: ' . json_last_error_msg());
    return [];
  }

  return !empty($data) ? $data : [];
}

/**
 * Shortcode to display Laravel events.
 */
function display_laravel_events()
{
  $events = get_laravel_events();
  if (empty($events)) {
    return '<p>No upcoming events found.</p>';
  }

  $output = '<div class="events-list">';
  foreach ($events as $event) {
    $output .= '<div class="event-item">';
    $output .= '<h2>' . esc_html($event['title']) . '</h2>';
    $output .= '<p>' . esc_html($event['description']) . '</p>';
    $output .= '<p><strong>Date:</strong> ' . esc_html($event['date']) . '</p>';
    $output .= '<a href="' . esc_url($event['registration_url']) . '" class="register-btn">Register</a>';
    $output .= '</div>';
  }
  $output .= '</div>';

  return $output;
}
add_shortcode('laravel_events', 'display_laravel_events');

/**
 * Shortcode to display event registrations.
 */
function display_laravel_event_registrations()
{
  $registrations = get_laravel_event_registrations();
  if (empty($registrations)) {
    return '<p>No registrations found.</p>';
  }

  $output = '<table class="event-registrations"><tr><th>Name</th><th>Email</th><th>Event</th></tr>';
  foreach ($registrations as $registration) {
    $output .= '<tr>';
    $output .= '<td>' . esc_html($registration['name']) . '</td>';
    $output .= '<td>' . esc_html($registration['email']) . '</td>';
    $output .= '<td>' . esc_html($registration['event_title']) . '</td>';
    $output .= '</tr>';
  }
  $output .= '</table>';

  return $output;
}
add_shortcode('laravel_event_registrations', 'display_laravel_event_registrations');

function event_registration_form()
{
  $events = get_laravel_events();

  if (empty($events)) {
    return '<p>No upcoming events available.</p>';
  }

  ob_start();
  ?>
  <form id="eventRegistrationForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="event">Select Event:</label>
    <select id="event" name="event_id" required>
      <?php foreach ($events as $event): ?>
        <option value="<?= esc_attr($event['id']); ?>"><?= esc_html($event['name']); ?></option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Register</button>
  </form>

  <p id="responseMessage"></p>

  <script>
    document.getElementById('eventRegistrationForm').addEventListener('submit', function (e) {
      e.preventDefault();
      let formData = new FormData(this);

      fetch('http://localhost:8000/api/register', {
        method: 'POST',
        body: JSON.stringify(Object.fromEntries(formData)),
        headers: { 'Content-Type': 'application/json' }
      })
        .then(response => response.json())
        .then(data => {
          document.getElementById('responseMessage').textContent = data.message;
        })
        .catch(error => console.error('Error:', error));
    });
  </script>
  <?php
  return ob_get_clean();
}

add_shortcode('event_registration', 'event_registration_form');
function add_events_to_rest_api()
{
  register_post_type(
    'events',
    array(
      'labels' => array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true, // ✅ Enable REST API support
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
      'rewrite' => array('slug' => 'events'),
    )
  );
}
add_action('init', 'add_events_to_rest_api');

?>
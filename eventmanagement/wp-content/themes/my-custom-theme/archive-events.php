<?php get_header(); ?>
<div class="container mx-auto px-4 py-6">
  <h1 class="text-4xl font-bold text-center mb-8">Upcoming Events</h1>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
    $args = array(
      'post_type' => 'events',
      'posts_per_page' => 10,
      'meta_key' => 'event_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
    );
    $events = new WP_Query($args);
    if ($events->have_posts()):
      while ($events->have_posts()):
        $events->the_post();
        ?>
        <div class="bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition duration-300">
          <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded-lg']); ?>
            </a>
          <?php endif; ?>
          <div class="p-4">
            <h2 class="text-xl font-semibold"><a href="<?php the_permalink(); ?>"
                class="hover:text-blue-500"><?php the_title(); ?></a></h2>
            <p class="text-gray-600"><strong>Date:</strong> <?php echo get_post_meta(get_the_ID(), 'event_date', true); ?>
            </p>
            <p class="text-gray-600"><strong>Location:</strong>
              <?php echo get_post_meta(get_the_ID(), 'event_location', true); ?></p>
            <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:underline font-medium">View Details</a>
          </div>
        </div>
      <?php endwhile; else: ?>
      <p class="text-center text-gray-500">No upcoming events.</p>
    <?php endif; ?>
  </div>

  <h1 class="text-4xl font-bold text-center mt-16 mb-10 text-gray-800">Laravel API Events</h1>
  <div id="laravel-events" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    <p class="text-center text-gray-500 col-span-3">Loading Laravel events...</p>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      fetch("http://127.0.0.1:8000/api/events")
        .then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          return response.json();
        })
        .then(data => {
          const eventsContainer = document.getElementById("laravel-events");
          eventsContainer.innerHTML = "";
          if (data.length > 0) {
            data.forEach(event => {
              const eventCard = `
                <div class="bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition duration-300">
                  
                  <div class="p-4">
                    <h2 class="text-xl font-semibold"><a href="${event.url}" class="hover:text-blue-500">${event.name}</a></h2>
                    <p class="text-gray-600"><strong>Date:</strong> ${event.event_date}</p>
                    <p class="text-gray-600"><strong>Location:</strong> ${event.location}</p>
                    <a href="${event.url}" class="text-blue-500 hover:underline font-medium">View Details</a>
                  </div>
                </div>
              `;
              eventsContainer.innerHTML += eventCard;
            });
          } else {
            eventsContainer.innerHTML = '<p class="text-center text-gray-500 col-span-3">No Laravel events found.</p>';
          }
        })
        .catch(error => {
          console.error("Error fetching Laravel events:", error);
          document.getElementById("laravel-events").innerHTML =
            '<p class="text-center text-red-500 col-span-3">Failed to load Laravel events.</p>';
        });
    });
  </script>
  <a href="http://127.0.0.1:8000/register/create?event_title=<?php echo urlencode(get_the_title()); ?>"
    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
    Register Now
  </a>




  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const registerButton = document.getElementById("registerButton");

      // Find the first event title from WordPress events
      let wpEventTitle = document.querySelector(".event-item h2")?.innerText || '';

      // Find the first event title from Laravel events
      let laravelEventTitle = document.querySelector("#laravel-events h2")?.innerText || '';

      // Use WordPress event title first, otherwise use Laravel event title
      let selectedEventTitle = wpEventTitle || laravelEventTitle;

      // Update button link dynamically
      if (selectedEventTitle) {
        registerButton.href = `http://127.0.0.1:8000/register/create?event_title=${encodeURIComponent(selectedEventTitle)}`;
      }
    });
  </script>

</div>
<?php get_footer(); ?>
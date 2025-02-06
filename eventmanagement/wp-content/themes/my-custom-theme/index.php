<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
  <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Blog Posts</h1>

  <!-- Add Events Link Button -->
  <div class="text-center mb-8">
    <a href="<?php echo site_url('/events/'); ?>"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-300">
      View Upcoming Events
    </a>
  </div>

  <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php if (have_posts()): ?>
      <?php while (have_posts()):
        the_post(); ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition duration-300">
          <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('medium', ['class' => 'w-full h-52 object-cover']); ?>
            </a>
          <?php endif; ?>
          <div class="p-5">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">
              <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition duration-200">
                <?php the_title(); ?>
              </a>
            </h2>
            <p class="text-gray-600 mb-3"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
            <a href="<?php the_permalink(); ?>"
              class="inline-block text-blue-500 font-semibold hover:text-blue-700 transition duration-200">
              Read More →
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-center text-gray-500 col-span-3">No blog posts found.</p>
    <?php endif; ?>
  </div>

  <!-- WordPress Events Section -->

</div>

<!-- Laravel Events Section -->

</div>

<?php get_footer(); ?>
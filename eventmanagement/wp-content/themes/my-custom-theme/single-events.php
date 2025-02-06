<?php get_header(); ?>
<div class="container mx-auto px-4 py-10">
  <div class="text-center mb-8">
    <a href="<?php echo site_url('/events'); ?>"
      class="inline-block bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition">
      ← Go to events
    </a>
  </div>

  <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>
      <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <?php if (has_post_thumbnail()): ?>
          <img src="<?php the_post_thumbnail_url('large'); ?>" class="w-full h-64 object-cover rounded-lg mb-4">
        <?php endif; ?>
        <h1 class="text-3xl font-bold text-gray-800"><?php the_title(); ?></h1>
        <p class="text-gray-600"><strong>Event Date:</strong> <?php echo get_post_meta(get_the_ID(), 'event_date', true); ?>
        </p>
        <p class="text-gray-600"><strong>Location:</strong>
          <?php echo get_post_meta(get_the_ID(), 'event_location', true); ?></p>
        <div class="mt-4 text-gray-700"><?php the_content(); ?></div>
      </div>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
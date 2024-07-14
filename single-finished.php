<?php

get_header(); ?>

<div class="max-w-4xl mx-auto px-4">
  
  <?php if (have_posts()) {
    while(have_posts()) {
      the_post(); ?>
      <div class="flex items-center mt-8">
        <div class="w-24 rounded-2xl overflow-hidden text-center shrink-0 bg-teal-500">
            <span class="block text-white font-bold text-xl uppercase"><?php the_time('M'); ?></span>
            <span class="block bg-teal-100 text-teal-700 text-5xl py-2"><span class="relative bottom-1"><?php the_time('d'); ?></span></span>
        </div>
        <div class="pl-6">
            <h1 class="text-3xl sm:text-4xl font-bold"><?php the_title(); ?></h1>
            <p class="text-xl text-gray-400">by <?php the_author_meta('display_name'); ?></p>
        </div>
      </div>
      <div class="mt-6 space-y-4">
        <?php the_content(); ?>
      </div>
      
    <?php }
  } ?>
</div>

<?php get_footer();

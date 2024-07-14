<?php

get_header(); ?>

<div class="max-w-4xl mx-auto px-4">

  <?php if (have_posts()) {
    while (have_posts()) {
      the_post(); ?>

  <div class="flex items-center gap-6 pt-5 mb-10">
    <div class="w-24 shrink-0 bg-teal-500 text-center rounded-2xl overflow-hidden">
      <span class="block text-white text-xl uppercase leading-8"><?= the_time('M') ?></span>
      <span class="block bg-teal-100 text-teal-700 text-5xl py-2">
        <span class="relative bottom-1"><?= the_time('d') ?></span>
      </span>
    </div>
    <div class="flex-1 p-">
      <h1 class="text-3xl sm:text-4xl font-bold"><?= the_title() ?></h1>
      <p class="text-xl text-gray-400">by <?= the_author_meta('display_name') ?></p>
    </div>
  </div>
  <div class="prose max-w-full mb-10">
    <?= the_content() ?>
  </div>

  <?php }
  } ?>

  <div class="sm:grid sm:grid-cols-2 bg-teal-700 text-white mb-10 rounded-2xl overflow-hidden">
    <div class="py-5 px-7">
      <h3 class="text-2xl font-bold mb-2">Most Recent Posts</h3>
      <ul class="list-disc pl-4 text-sm leading-loose ">

        <?php
        $recentPosts = new WP_Query(array(
          'posts_per_page' => 5
        ));

        while ($recentPosts->have_posts()) {
          $recentPosts->the_post();
        ?>

        <li><a class="hover:text-teal-200 hover:underline" href="<?= the_permalink() ?>"><?= the_title() ?></a></li>

        <?php } ?>

      </ul>
    </div>
    <div class="hidden sm:block bg-cover bg-center"
      style="background-image: url('<?= get_theme_file_uri('/images/beach.jpg') ?>');">

    </div>
  </div>
</div>

<?php get_footer();
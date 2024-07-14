<?php

get_header(); ?>

<div class="max-w-4xl mx-auto px-4">

  <?php if (have_posts()) {
    while (have_posts()) {
      the_post(); ?>

  <div class="flex gap-x-6 my-12">
    <div class="rounded-2xl overflow-hidden text-center">
      <h3 class="text-xl px-5 py-1 bg-[#14B8A6] text-white uppercase"><?= the_time('M') ?></h3>
      <h3 class="text-5xl px-5 py-1 bg-[#CCFBF1] text-[#0F766E]"><?= the_time('d') ?></h3>
    </div>
    <div>
      <h1 class="text-[40px] font-bold leading-[1.4]"><?= the_title() ?></h1>
      <p class="text-[20px] text-[#8B8B8B] ">by <?= the_author_meta('display_name') ?></p>
    </div>
  </div>
  <?= the_content() ?>

  <?php }
  } ?>

</div>

<?php get_footer();
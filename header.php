<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="bg-green-300">
    <div class="max-w-4xl mx-auto mb-5 px-4 flex justify-between items-center">
      <h1 class="text-xl sm:text-3xl py-10"><a href="<?php echo get_home_url(); ?>" class="hover:text-teal-600">The Best
          Blog In The World</a></h1>
      <svg id="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="
      text-gray-500 hover:text-gray-700 cursor-pointer" viewBox="0 0 16 16">
        <path
          d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
      </svg>
    </div>
  </div>

  <div id="search-overlay" class="invisible bg-white/90 backdrop-blur-sm fixed inset-0 z-10">
    <div
      class="box-border w-[640px] max-w-full mx-auto pt-4 sm:pt-16 px-4 sm:px-0 flex flex-col justify-start items-center">

      <svg id="close-btn" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
        class="self-end shrink-0 text-[#F87171] cursor-pointer" viewBox="0 0 16 16">
        <path
          d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
      </svg>

      <form class="relative w-full mt-[23px] h-[72px] border border-[#e8e8e8] shadow-[0_4px_4px_0px_rgba(0,0,0,0.05)]">
        <input type="text" name="s" id="s" class="block  w-full h-full text-[#7B7B7B] text-xl p-2"
          placeholder="What are you looking for?">

        <div
          class="w-[70px] h-[70px] absolute right-0 top-0 flex justify-center items-center bg-[#0D9488] cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-white"
            viewBox="0 0 16 16">
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
          </svg>
        </div>
      </form>

    </div>
  </div>
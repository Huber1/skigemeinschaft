<?php

/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 * @var $slot
 */

$padding ??= true;

$maxSize = "max-w-7xl";
$sizeField = $page->content()->size();
if ($sizeField->exists()) {
  switch ($sizeField->value()) {
    case "small":
      $maxSize = "max-w-3xl";
  }
}

?>
<!DOCTYPE html>
<html lang="de" class="bg-white">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>

  <?php
  $seodescription = trim($site->seodescription());
  if (!empty($seodescription)): ?>
    <meta name="description" content="<?= $seodescription ?>">
  <?php endif ?>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/styles.css',
    '@auto'
  ]) ?>

  <?= $slot ?>

  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const headerImg = document.querySelector('#header-image');
      window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
          headerImg.classList.add('lg:bottom-0');
          headerImg.classList.remove('lg:shadow-md');
        } else {
          headerImg.classList.remove('lg:bottom-0');
          headerImg.classList.add('lg:shadow-md');
        }
      });
    });
  </script>
</head>
<body>

<div id="header-div" class="px-8 lg:fixed lg:top-0 lg:left-0 lg:right-0 bg-primary-50 shadow-md">
  <header class="max-w-7xl m-auto py-2 md:py-0">
    <a
      id="header-image"
      class="block absolute px-2 py-4 bg-primary-50 lg:transition-all duration-700 lg:-bottom-20 lg:shadow-md"
      href="<?= $site->url() ?>"
      aria-label="Root Page">
      <img
        src="<?= asset('assets/images/logo.svg')->url() ?>"
        alt=""
        class="h-24 md:h-32">
    </a>
    <div class="flex flex-col md:flex-row justify-center items-center text-primary text-lg font-medium">
      <nav>
        <?php
        /*
          In the menu, we only fetch listed pages,
          i.e. the pages that have a prepended number
          in their foldername.

          We do not want to display links to unlisted
          `error`, `home`, or `sandbox` pages.

          More about page status:
          https://getkirby.com/docs/reference/panel/blueprints/page#statuses
        */
        ?>
        <?php foreach ($site->children()->listed() as $item): ?>
          <a
            <?php e($item->isOpen(), 'aria-current="page"') ?>
            href="<?= $item->url() ?>"
            class="block relative px-2 py-6 float-left text-inherit after:absolute after:right-0 after:top-1/2 after:translate-x-1/2 after:-translate-y-1/2 after:text-sm after:content-['⁄'] after:text-slate-400 last:after:content-none">
            <?= $item->title()->esc() ?>
          </a>
        <?php endforeach ?>
      </nav>
    </div>
  </header>
</div>

<div class="lg:mt-24 <?php e($padding, "px-4") ?>">
  <main role="main" class="<?= $maxSize ?> m-auto pb-16">

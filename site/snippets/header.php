<?php

/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 * @var $slot
 */

$padding ??= true

?>
<!DOCTYPE html>
<html lang="de">
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
</head>
<body>

<div class="px-8">
  <header class="max-w-7xl m-auto py-2 md:py-0 flex flex-col md:flex-row justify-between items-center">
    <a class="block px-2 py-4" href="<?= $site->url() ?>" aria-label="Root Page">
      <img
        src="<?= asset('assets/images/logo.svg')->url() ?>"
        alt=""
        class="h-16">
    </a>

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
          class="block px-2 py-4 float-left text-inherit">
          <?= $item->title()->esc() ?>
        </a>
      <?php endforeach ?>
    </nav>
  </header>
</div>

<div class="<?php e($padding, "px-4") ?>">
  <main role="main" class="max-w-7xl m-auto pb-16">

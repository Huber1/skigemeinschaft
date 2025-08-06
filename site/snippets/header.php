<!DOCTYPE html>
<html lang="de">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php
  /*
    In the title tag we show the title of our
    site and the title of the current page
  */
  ?>
  <title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>

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

  <?php
  /*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body>

<header class="max-w-7xl m-auto py-2 md:py-0 px-4 flex flex-col md:flex-row justify-between items-center">
  <a class="block px-2 py-4" href="<?= $site->url() ?>">
    <img
      src="<?= asset('assets/images/logo.svg')->url() ?>"
      alt=""
      class="w-16">
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
        class="block px-2 py-4 float-left">
        <?= $item->title()->esc() ?>
      </a>
    <?php endforeach ?>
  </nav>
</header>

<main role="main" class="max-w-7xl m-auto pb-16 px-8">

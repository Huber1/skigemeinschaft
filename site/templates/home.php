<?php

use Kirby\Cms\Page;

/**
 * @var Page $page
 */

?>
<?php snippet('header') ?>


<!-- Hero section -->
<div
  class="h-128 p-8 flex flex-col justify-center gap-16 items-center bg-cover bg-center"
  <?php if ($page->content()->background()->toFile() !== null): ?>
    style="background-image: url('<?= $page->content()->background()->toFile()->url() ?>')"
  <?php endif; ?>
>

  <img
    src="<?= asset('assets/images/logo.svg')->url() ?>"
    alt=""
    class="h-64">

  <div class="flex gap-4">
    <a href="<?= $page->content()->angebote_url()->toUrl() ?>" class="block bg-salmon px-4 py-2">Angebote</a>
    <a href="<?= $page->content()->mitglied_werden_url()->toUrl() ?>" class="block bg-salmon px-4 py-2">Mitglied werden</a>
  </div>
</div>

<!-- Content -->
<?php foreach ($page->layout()->toLayouts() as $layout): ?>
  <section class="mt-8 grid grid-cols-12 gap-12">
    <?php foreach ($layout->columns() as $column): ?>
      <div class="mb-12" style="grid-column: span <?= $column->span() ?>">
        <div class="prose">
          <?= $column->blocks() ?>
        </div>
      </div>
    <?php endforeach ?>
  </section>
<?php endforeach ?>

<?php snippet('footer') ?>

<?php

use Kirby\Cms\Page;

/**
 * @var Page $page
 */

?>
<?php snippet('header') ?>

<div class="py-6">
  <h1 class="text-center text-3xl"><?= $page->title()->esc() ?></h1>
</div>

<div class="mb-4 flex items-center text-salmon font-medium">
  <svg xmlns="http://www.w3.org/2000/svg" class="-ml-2 size-6" viewBox="0 0 24 24" fill="currentColor">
    <path
      d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path>
  </svg>
  <a href="<?= $page->parent()->url() ?>">Zurück zur Übersicht</a>
</div>

<!-- Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
  <div class="lg:col-span-2">
    <div class="prose max-w-none">
      <?= $page->content()->text()->kirbytext() ?>
    </div>
    <div class="mt-4">
      <table>
        <tr>
          <td class="font-bold align-top pr-4">Termin</td>
          <td class="prose pb-4"><?= $page->termin() ?></td>
        </tr>
        <?php foreach ($page->eigenschaften()->toStructure() as $item): ?>
          <tr>
            <td class="font-bold align-top pr-4"><?= $item->name() ?></td>
            <td class="prose pb-4"><?= $item->value() ?></td>
          </tr>
        <?php endforeach ?>
        <?php if ($page->content()->anmeldeschluss() != null): ?>
          <tr>
            <td class="font-bold pr-4">Anmeldeschluss:</td>
            <td class="prose"><?= $page->content()->anmeldeschluss()->toDate('d.m.Y') ?></td>
          </tr>
        <?php endif ?>
      </table>
    </div>
  </div>
  <div>
    <?php if ($page->content()->cover()->toFile() != null): ?>
      <img
        src="<?= $page->content()->cover()->toFile()->url() ?>"
        class="rounded-lg">
    <?php endif ?>
  </div>
</div>

<?php snippet('footer') ?>

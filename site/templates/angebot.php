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


<!-- Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
  <div class="lg:col-span-2">
    <div class="prose max-w-none">
      <?= $page->content()->text()->kirbytext() ?>
    </div>
    <div class="mt-4">
      <table>
        <?php foreach ($page->eigenschaften()->toStructure() as $item): ?>
          <tr>
            <td class="font-bold align-top pr-4"><?= $item->name() ?></td>
            <td class="prose pb-4"><?= $item->value() ?></td>
          </tr>
        <?php endforeach ?>
        <tr>
          <td class="font-bold pr-4">Anmeldeschluss:</td>
          <td><?= $page->content()->anmeldeschluss()->toDate('d.m.Y') ?></td>
        </tr>
      </table>
    </div>
  </div>
  <div>
    <img
      src="<?= $page->content()->cover()->toFile()->url() ?>"
      class="rounded-lg">
  </div>
</div>

<?php snippet('footer') ?>

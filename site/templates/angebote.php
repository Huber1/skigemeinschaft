<?php

/**
 * @var Page $page
 */

use Kirby\Cms\Page;

function format_age(int $minAge, int $maxAge): string|null
{
  if ($minAge === 0 && $maxAge === 0) return null;

  if ($minAge !== 0 && $maxAge === 0) return "Ab $minAge Jahren";

  if ($minAge === 0 && $maxAge !== 0) return "Bis $maxAge Jahren";

  return "Von $minAge bis $maxAge Jahren";
}

?>
<?php snippet('header') ?>

<div class="py-6">
  <h1><?= $page->title()->esc() ?></h1>
</div>

<?php
$children = $page->children();
$children = [];
if (empty($children)):
  ?>
  <div class="text-center font-bold mt-4">
    Die Angebote sind für diese Saison noch nicht befüllt. Schau gerne später nochmal vorbei!
  </div>
<?php endif; ?>

<!-- Angebote Cards -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
  <?php foreach ($children as $child): ?>
    <a href="<?= $child->url() ?>" class="block cursor-pointer group">
      <div class="p-2 flex gap-4 items-stretch bg-salmon-50  rounded-2xl">
        <div
          class="flex-2/5 bg-cover rounded-lg"
          style="background-image: url('<?= $child->cover()->toFile()->url() ?>')">
        </div>
        <div class="flex-3/5 flex flex-col gap-2">
          <h2 class="text-xl font-medium text-salmon group-hover:text-salmon">
            <?= $child->title() ?>
          </h2>
          <div class="text-primary flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
              <path
                d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 13V15H6V13H8ZM13 13V15H11V13H13ZM18 13V15H16V13H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path>
            </svg><?= $child->termin() ?>
          </div>
          <?php
          $alter = format_age($child->minAlter()->toInt(), $child->maxAlter()->toInt());
          if ($alter != null): ?>
            <div class="text-primary">
              <?= $alter ?>
            </div>
          <?php endif ?>
          <div class="line-clamp-3 text-gray-600">
            <?= $child->text()->kirbytext() ?>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>

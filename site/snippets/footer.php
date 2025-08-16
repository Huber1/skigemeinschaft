<?php
/**
 * @var Site $site
 */

use Kirby\Panel\Site;

?>
</main>
<footer class="bg-primary py-4 text-white text-sm">
  <div class="max-w-7xl m-auto px-4 flex flex-col items-center">
    <div class="text-center prose max-w-none text-inherit text-sm">
      <?= $site->footertext() ?>
    </div>
    <!-- Partner -->
    <h3 class="mt-8 text-lg font-medium">Unsere Partner</h3>
    <div class="mt-6 w-full md:w-2/3 lg:w-1/2 flex flex-wrap items-center justify-center gap-4">
      <?php foreach ($site->sponsors()->toStructure() as $sponsor): ?>
        <img class="h-10 w-auto max-w-[8rem] max-h-12 object-contain object-center"
             src="<?= $sponsor->logo()->toFile()->url() ?>" alt="<?= $sponsor->name() ?>">
      <?php endforeach ?>
    </div>
    <div class="mt-4">
      <?php foreach ($site->footerlinks()->toStructure() as $link): ?>
        <a href="<?= $link->url()->toUrl() ?>"><?= $link->label() ?></a>
      <?php endforeach ?>
    </div>
  </div>
</footer>

<?= js([
  'assets/js/index.js',
  '@auto'
]) ?>

</body>
</html>

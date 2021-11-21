<div class="card card-depute mx-2">
  <div class="liseret" style="background-color: <?= $depute["couleurAssociee"] ?>"></div>
  <div class="card-avatar">
    <?php if ($depute['img']): ?>
      <img class="img-lazy" src="<?= asset_url() ?>imgs/placeholder/placeholder-face-2.png" width="130" height="166" data-src="<?= base_url(); ?>assets/imgs/deputes_nobg/depute_<?= substr($depute["mpId"], 2) ?>.png" alt="<?= $depute['nameFirst'].' '.$depute['nameLast'] ?>">
      <?php else: ?>
      <img class="img-lazy" src="<?= asset_url() ?>imgs/placeholder/placeholder-face-2.png" width="130" height="166" alt="<?= $depute['nameFirst'].' '.$depute['nameLast'] ?>">
    <?php endif; ?>
  </div>
  <div class="card-body d-flex flex-column align-items-center justify-content-center">
    <div>
      <<?= $tag ?> class="d-block card-title">
      <?php if ($cat): ?>
        <?= $depute['nameFirst'] .' ' . $depute['nameLast'] ?>
        <?php else: ?>
        <a href="<?= base_url(); ?>deputes/<?= $depute['dptSlug'].'/depute_'.$depute['nameUrl'] ?>" class="stretched-link no-decoration"><?= $depute['nameFirst'] .' ' . $depute['nameLast'] ?></a>
      <?php endif; ?>
      </<?= $tag ?>>
      <?php if (isset($stats)): ?>
        <span class="badge badge-stats mb-3"><?= $stats ?></span>
      <?php endif; ?>
      <span class="d-block"><?= $depute["cardCenter"] ?></span>
      <?php if (isset($depute["badgeCenter"])): ?>
        <span class="badge badge-center mt-2 <?= $depute['badgeCenterColor'] ?>">
          <?= $depute["badgeCenter"] ?>
        </span>
      <?php endif; ?>
    </div>
    <?php if ($cat): ?>
      <div class="img-group-cat mt-3">
        <picture>
          <source srcset="<?= asset_url(); ?>imgs/groupes/webp/<?= $depute['libelleAbrev'] ?>.webp" type="image/webp">
          <source srcset="<?= asset_url(); ?>imgs/groupes/<?= $depute['libelleAbrev'] ?>.png" type="image/png">
          <img src="<?= asset_url(); ?>imgs/groupes/<?= $depute['libelleAbrev'] ?>.png" alt="<?= $depute['libelle'] ?>">
        </picture>
      </div>
    <?php endif; ?>
  </div>
  <?php if ($cat): ?>
    <div class="mb-3">
      <a class="btn btn-cat btn-primary stretched-link" href="<?= base_url(); ?>deputes/<?= $depute['dptSlug'].'/depute_'.$depute['nameUrl'] ?>" role="button">Découvrez son activité</a>
    </div>
    <?php else: ?>
      <div class="card-footer d-flex justify-content-center align-items-center">
        <span><?= $depute["libelle"] ?> (<?= $depute["libelleAbrev"] ?>)</span>
      </div>
  <?php endif; ?>
</div>

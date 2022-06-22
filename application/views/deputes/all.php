<div class="container-fluid pg-depute-all mb-5" id="container-always-fluid">
  <div class="row">
    <div class="container">
      <div class="row row-grid bloc-titre">
        <div class="col-12">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-lg-8">
          <?php if ($legislature == legislature_current()): ?>
            <p>
              L'Assemblée nationale compte <b>577 députés</b>. Ils sont élus tous les 5 ans lors des élections législatives. Les dernières ont eu lieu en juin 2022 et les prochaines se tiendront en 2027, quelques semaines après l'élection présidentielle.
            </p>
            <?php if ($active): ?>
              <p>
                L'Assemblée nationale compte actuellement <?= $male["n"] ?> députés hommes (<?= $male["percentage"] ?> %) et <?= $female["n"] ?> femmes (<?= $female["percentage"] ?> %).
              </p>
              <?php if ($number_inactive == 0): ?>
                <p>
                  Depuis le début de la <?= legislature_current() ?><sup>ème</sup> législature, <b>aucun député n'a quitté l'Assemblée</b></a>.
                </p>
              <?php else: ?>
                <p>
                  Depuis le début de la <?= legislature_current() ?><sup>ème</sup> législature, <b><?= $number_inactive ?> députés ont quitté l'Assemblée</b> pour cause de nomination au Gouvernement, de démission ou de décès. Pour découvrir ces députés qui ne sont plus en activité, <a href="<?= base_url() ?>deputes/inactifs" ?>cliquez ici</a>.
                </p>
              <?php endif; ?>
              <div class="d-flex flex-wrap justify-content-around mt-5">
                <a href="<?= base_url() ?>deputes/legislature-15" class="btn btn-secondary my-2">Députés de la 15<sup>ème</sup> législature</a>
                <a href="<?= base_url() ?>deputes/legislature-14" class="btn btn-secondary my-2">Députés de la 14<sup>ème</sup> législature</a>
              </div>
            <?php else: ?>
              <p>
                Depuis leur élection, <?= $number_inactive ?> députés ont quitté l'Assemblée pour cause de nomination au Gouvernement, de démission, ou de décès. Découvrez sur cette page les députés plus en activité.
              </p>
              <p>
                Pour découvrir les 577 députés actuellement en activité, <a href="<?= base_url() ?>deputes">cliquez ici.</a>
              </p>
            <?php endif; ?>
          <?php else: ?>
            <p>
              Cette page présente tous les députés qui ont servi lors de la <?= $legislature ?><sup>ème</sup> législature.
            </p>
            <p>
              Pendant la <?= $legislature ?><sup>ème</sup> législature, il y avait à l'Assemblée nationale <?= $male["n"] ?> députés hommes (<?= $male["percentage"] ?> %) et <?= $female["n"] ?> femmes (<?= $female["percentage"] ?> %).
            </p>
            <p>
              Pour découvrir les députés de la législature actuelle, <a href="<?= base_url() ?>deputes">cliquez ici</a>.
            </p>
          <?php endif; ?>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <?php if ($legislature == legislature_current()): ?>
            <?php if ($active): ?>
              <h2>Les députés en activité de la <?= $legislature ?><sup>ème</sup> législature (2022-2027)</h2>
              <?php else: ?>
              <h2>Les <span class="text-primary"><?= count($deputes) ?> anciens députés</span> de la <?= $legislature ?><sup>ème</sup> législature</h2>
            <?php endif; ?>
            <?php else: ?>
            <h2>Les <span class="text-primary"><?= count($deputes) ?> députés</span> de la <?= $legislature ?><sup>ème</sup> législature</h2>
          <?php endif; ?>
        </div>
      </div>
      <div class="row mt-2">
        <div class="pb-4 col-lg-3 search-element">
          <div class="sticky-top sticky-offset sticky-top-lg">
            <!-- Groupes -->
            <div class="d-flex flex-column d-lg-none">
              <?php if ($active): ?>
                <div class="mt-3 badges-groupes">
                  <?php foreach ($groupes_mobile as $groupe): ?>
                    <a class="badge badge-primary no-decoration" href="<?= base_url() ?>groupes/legislature-<?= $groupe['legislature'] ?>/<?= mb_strtolower($groupe['libelleAbrev']) ?>/membres">
                      <span><?= $groupe['effectif'] ?></span> <?= $groupe['libelle'] ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
            <!-- Search -->
            <div class="mt-3 mt-lg-0">
              <input type="text" id="quicksearch" placeholder="Recherchez un député..." />
            </div>
            <!-- Filters -->
            <div class="filters mt-md-2 d-none d-lg-block" id="filter">
              <input class="radio-btn" name="radio-collection" id="radio-1" type="radio" checked="" value="*">
              <label for="radio-1" class="radio-label d-flex align-items-center">
                <span class="d-flex align-items-center"><b>Tous les députés</b></span>
              </label>
              <?php $i=2 ?>
              <?php foreach ($groupes as $groupe): ?>
                <input class="radio-btn" name="radio-collection" id="radio-<?= $i ?>" type="radio" value=".<?= strtolower($groupe['libelleAbrev']) ?>">
                <label class="radio-label d-flex align-items-center" for="radio-<?= $i ?>">
                  <span class="d-flex align-items-center"><?= $groupe['libelleAbrev'] ?></span>
                </label>
                <?php $i++ ?>
              <?php endforeach; ?>
            </div>
            <!-- Députés inactifs bouton -->
            <div class="d-none d-lg-flex justify-content-center mt-md-2">
              <a class="btn btn-outline-primary d-none d-md-block" href="<?= base_url() ?>deputes/inactifs">Liste des <b>anciens députés</b></a>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-12">
          <div class="row mt-2 sorting">
            <?php foreach ($deputes as $depute): ?>
              <div class="col-md-6 col-xl-4 sorting-item <?= strtolower($depute["libelleAbrev"]) ?>">
                <div class="d-flex justify-content-center">
                  <?php $this->load->view('deputes/partials/card_home.php', array('depute' => $depute, 'tag' => 'h3', 'cat' => false, 'logo' => false)) ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

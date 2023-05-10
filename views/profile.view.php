<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require base_path("views/partials/head.view.php");
  ?>
  <title>Profile</title>
</head>

<body>
  <?php
  require base_path("views/partials/nav.view.php");
  ?>
  <div style="padding: 1rem"></div>
  <div style="margin-top: 6rem;">
    <div style="position: relative;">
      <img src=<?= "{$ASSET_URL}/assets/imgs/home/header2.webp" ?> alt="cover" style="height: 40rem;" />
      <div style="width: 30rem;position:absolute;bottom:0;left:20%;translate:-50% 50%;border-radius:1000px;overflow:hidden">
        <img src=<?= "{$ASSET_URL}/assets/imgs/home/header4.webp" ?> alt="<?= $userName ?>" />
      </div>
    </div>
    <div class="container py-3">
      <div class="d-flex justify-content-between" style="margin-left:30%">
        <div class="d-flex flex-column" style="gap: 1.8rem">
          <h3 style="font-size: 4rem;"><?= $userName ?></h3>
          <div class="d-flex" style="gap:1.8rem">
            <span>
              <i class="fa fa-flag"></i>
              <?= $isHost ? "$location, $country" : $country ?>
            </span>
            <span style="<?= !$isHost ? "display:none" : '' ?>">
              <i class="fa fa-star"></i>
              <?= $rate ?>
            </span>
            <span style="<?= !$isHost ? "display:none" : '' ?>">
              <?= $status ?>
            </span>
          </div>
        </div>

        <div class="d-flex align-items-center" style="gap: 1.6rem;">
          <?php if ($canEditProfile) : ?>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#profileForms">
              <i class="fa-solid fa-pen-to-square fa-2xl"></i>
            </button>
          <?php endif; ?>
          <?php if (!$canEditProfile) : ?>
            <a href="mailto:<?= $email ?>" class="main-btn">Contact</a>
            <button class="second-btn" data-bs-toggle="modal" data-bs-target="#joinForm" style="<?= !$isHost ? "display:none" : '' ?>">Join</button>
          <?php endif; ?>
        </div>
      </div>

      <div class="d-flex flex-column p-5 my-5" style="background:var(--second-bg);gap:2.8rem;">
        <div style="color: var(--h-color);font-size:1.6rem">
          <h4 style="font-size: 3rem;margin-bottom:1rem">Some statistics</h4>
          <?php
          if ($isHost)
            echo "<p style='color: black'><?= $travellersCount ?> travellers joined with this host</p>
            <p style='color: black'>he shared {$postsCount} posts</p>
            <p style='color: black'>he commented {$commentsCount} comment</p>
            ";
          else
            echo "<p style='color: black'>{$hostsCount} hosts he joined with</p>
              <p style='color: black'>he shared {$postsCount} posts</p>
              <p style='color: black'>he commented  {$commentsCount} comment</p>
              ";

          ?>
        </div>
        <?php if($isHost):?>
        <div style="color: var(--h-color);font-size:1.6rem">
          <h4 style="font-size: 3rem;margin-bottom:1rem">Description</h4>
          <p style="color: black"><?= $description ?></p>
        </div>
        <?php endif;?>
        <div style="color: var(--h-color);font-size:1.6rem">
          <h4 style="font-size: 3rem;margin-bottom:1rem"><?= $isHost ? 'My needs' : 'My services' ?></h4>
          <ul>
            <?php foreach ($services as $service) : ?>
              <li><?= $service ?></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div style="color: var(--h-color);font-size:1.6rem">
          <h4 style="font-size: 3rem;margin-bottom:1rem">Posts</h4>
          <?php
          foreach ($posts as $post) {
            echo "<a href='./posts?id={$post['id']}'>{$post['title']}</a>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  require base_path("views/partials/footer.view.php");
  require base_path("views/partials/scripts.view.php");
  require base_path('views/partials/profileModalForm.view.php');
  require base_path('views/partials/joinForm.view.php');
  ?>
</body>

</html>
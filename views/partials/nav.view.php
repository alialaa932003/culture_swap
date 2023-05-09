<?php
// $userData = $_SESSION['user'];
require base_path('controller/nav.php');

// echo "<br>";
// echo "<pre>";
// var_dump($userData);
// echo "</pre>";

?>
<nav class="navbar navbar-expand-lg active ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/culture_swap/">culture swap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/culture_swap/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/culture_swap/about">how it is work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/culture_swap/faq">support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/culture_swap/posts">community</a>
                </li>

                <?php if (!empty($userData)) : ?>
                    <li class="nav-item">
                        <a class="nav-link userInfo" href="#">
                            <div class="user_img">
                                <img src=<?= $userData['profileImg'] ?> alt="">

                            </div>
                            <h4><?= $userData['name'] ?></h4>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (empty($userData)) : ?>
                    <li class="nav-item">
                        <a class=" navJoinBtn second-btn" href="#">join now</a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($userData)) : ?>
                    <div class="dropdown notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bell"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <?php foreach ($notimerge as $noti) : ?>

                                <li class="noti-item ">

                                    <?php if ($noti['action'] == 2) : ?>
                                        <span class="noti-icon purple-noti">
                                            <i class="fa-regular fa-comment"></i>
                                        </span>
                                    <?php elseif ($noti['action'] == 1) :; ?>
                                        <span class="noti-icon green-noti">
                                            <i class="fa-regular fa-bell"></i>
                                        </span>
                                    <?php else : ?>
                                        <span class="noti-icon red-noti">
                                            <i class="fa-regular fa-heart"></i>
                                        </span>
                                    <?php endif; ?>

                                    <div>
                                        <p><?= $noti['content'] ?></p>


                                        <div class="noti-actions">
                                            <?php if ($noti['action'] == 2) : ?>
                                                <a class="second-btn" href="/culture_swap/post?id=<?= $noti['action_id'] ?>">view post</a>

                                            <?php elseif ($noti['action'] == 1) : ?>
                                                <?php if ($noti['Status'] == 0) : ?>
                                                    <form action="/culture_swap/reservation" class="noti-actions" method="POST">
                                                        <input type="hidden" name="action_id" value=<?= $noti['action_id'] ?>>
                                                        <input type="hidden" name="noti_id" value=<?= $noti['Id'] ?>>
                                                        <button class="second-btn" name="acceptNoti" value="1" type="submit">accept</button>
                                                        <button class="main-btn" name="cancelNoti" value="2" type="submit">cancel</button>
                                                    </form>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <a class="second-btn" href="/culture_swap/post?id=<?= $noti['action_id'] ?>">view post</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <button class="logoutBtn second-btn">logout</button>
                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>
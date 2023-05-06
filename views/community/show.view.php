<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<?php
require base_path("views/partials/head.view.php");
?>
<link rel="stylesheet" href="/culture_swap/public/assets/css/blog.css">
<title>blog</title>

<body>

    <?php
    require base_path("views/partials/nav.view.php");
    ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title " id="exampleModalLabel">edit post</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="postItem">
                        <label for="title">title</label>
                        <input placeholder="enter title" name="title" type="text">
                    </div>
                    <div class="postItem">
                        <label for="content">content</label>
                        <textarea placeholder="enter content" name="content" type="text"></textarea>
                    </div>
                    <div class="postItem">
                        <label for="image">image</label>
                        <input placeholder="enter image" name="image" type="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="second-btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <section class="blogDetails section-padding">
        <div class="container">
            <div class="head">
                <h2 class="heading">
                    post details
                </h2>
                <button class="main-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">edit post</button>

            </div>
            <div class="row">
                
                 <!------------------------ Recent posts -------------------------------------->

                <div class="col-lg-4">
                    <div class="recent-posts">
                        <h4>recent posts</h4>
                        <div class="item">
                            <div class="image">
                                <a href="#">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header5.webp" ?> alt="">
                                </a>
                            </div>


                            <div class="content">
                                <h5>
                                    <a href="#">
                                        Where Watch English Movies Free?
                                    </a>
                                </h5>
                                <span>
                                    <i class="fa fa-clock" aria-hidden="true"></i>

                                    12 mar 2020
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <a href="#">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5>
                                    <a href="#">
                                        Where Watch English Movies Free?
                                    </a>
                                </h5>
                                <span>
                                    <i class="fa fa-clock" aria-hidden="true"></i>

                                    12 mar 2020
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <a href="#">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5>
                                    <a href="#">
                                        Where Watch English Movies Free?
                                    </a>
                                </h5>
                                <span>
                                    <i class="fa fa-clock" aria-hidden="true"></i>

                                    12 mar 2020
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <a href="#">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5>
                                    <a href="#">
                                        Where Watch English Movies Free?
                                    </a>
                                </h5>
                                <span>
                                    <i class="fa fa-clock" aria-hidden="true"></i>

                                    12 mar 2020
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <a href="#">
                                    <img src=<?= "${ASSET_URL}assets/imgs/home/header5.webp" ?> alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5>
                                    <a href="#">
                                        Where Watch English Movies Free?
                                    </a>
                                </h5>
                                <span>
                                    <i class="fa fa-clock" aria-hidden="true"></i>

                                    12 mar 2020
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                 <!------------------------ end  Recent posts -------------------------------------->

                <div class="col-lg-8">
                    <div class="details">
                        <div class="image">
                            <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                            <button class="love">
                                <span>
                                    <i class="fa-regular fa-heart"></i>
                                </span>
                            </button>
                        </div>
                        <div class="article-header">
                            <div class="date">
                                <span>07</span>
                                <span>may 12</span>
                            </div>
                            <div class="heading-header">
                                <h3>
                                    <a href="#"><?= $postdet["title"]  ?></a>
                                </h3>
                                <div class="company-content">
                                    <div class="item">
                                        <a href="#">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            ali alaa
                                        </a>
                                    </div>
                                    <div class="item">
                                        <span>
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            host
                                        </span>

                                    </div>
                                    <div class="item">
                                        <span>
                                            <i class="fa fa-location" aria-hidden="true"></i>
                                            norway
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="detailsContent">
                            <div class="total">
                                <div class="totalItem">
                                    <span class="totalIcon"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                    <span class="totalCount">20</span>
                                </div>
                                <div class="totalItem">
                                    <span class="totalIcon"><i class="fa fa-comment" aria-hidden="true"></i></span>
                                    <span class="totalCount">20</span>
                                </div>
                            </div>

                            <p>
                                <?= $postdet["content"] ?> 
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="commentsSection">
        <div class="container">
            <div class="head">
                <h2 class="heading">comments</h2>
            </div>
            <form class="addComment">
                <label for="comment">add comment</label>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
                <button class="main-btn " type="submit">submit</button>
            </form>

        </div>
    </section>
    <div class="allComments">
        <div class="container">
            <!-----------------------------   comments             ----------------------------------->
           <?php if(isset($comments)) :?>

            <?php $cnt = 0; ?> 
            <?php while($cnt < $num_comments )  :?> 
            <div class="comment row"> 

            <?php $name = $comments[$cnt]["first_name"] ." ". $comments[$cnt]["last_name"] ?>
            <div class="col-lg-2">
                    <div class="user">
                        <div class="userImg">
                            <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                        </div>

                        <div class="userContent">
                            <h3><?=$name?></h3>
                        </div>

                    </div>

                </div>
                
                <div class="col-lg-10">
                    
                    <p><?=$comments[$cnt]["content"]?></p>

                    <?php $cnt++ ?>
                  
            
                </div>

               
            </div>
            <?php endwhile ?>
            <?php endif ?>

            <?php if(empty($comments)) :?>
                
                      <p style="font-size: 20px;"> No comments found </p>
                
              
                <?php endif ?>

                
            
     <!--------------------------------------- end  comments   ----------------------------------->


        </div>
    </div>
    <?php
    require base_path("views/partials/footer.view.php");
    ?>
    <?php
    require base_path("views/partials/scripts.view.php");
    ?>
</body>

</html>
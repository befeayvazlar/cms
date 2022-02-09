<div class="main col-md-8">

    <!-- page-title start -->
    <!-- ================ -->
    <h1 class="page-title"><?php echo $news->title; ?></h1>
    <!-- page-title end -->

    <!-- blogpost start -->
    <!-- ================ -->
    <article class="blogpost full">
        <header>
            <div class="post-info">
                <span class="post-date">
                    <i class="icon-calendar"></i>
                    <span class="month"><?php echo get_readable_date($news->createdAt); ?></span>
                </span>
                <span class="viewcount"><i class="icon-eye"></i> <a href="#"><?php echo $news->viewCount; ?> Görüntülenme</a></span>
                <div class="link pull-right" style="position: relative;top: -7.5px;">
                    <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
                        <li class="facebook">
                            <a class="share-button" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo base_url("haber/$news->url"); ?>&t=<?php echo $news->title; ?> Haberi"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="twitter">
                            <a class="share-button" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $news->title; ?>&url=<?php echo base_url("haber/$news->url"); ?>"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="linkedin">
                            <a class="share-button" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo base_url("haber/$news->url"); ?>"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="blogpost-content">

            <?php if($news->news_type == "image") { ?>

                <div class="overlay-container mb-20">
                    <img src="<?php echo base_url("panel/uploads/news_v/$news->img_url"); ?>" alt="<?php echo $news->url; ?>">
                    <a class="overlay-link popup-img" href="<?php echo base_url("panel/uploads/news_v/$news->img_url"); ?>"><i class="fa fa-search-plus"></i></a>
                </div>

            <?php } else { ?>

                <div class="embed-responsive embed-responsive-16by9 mb-20">

                    <?php $youtubeID = getYouTubeVideoId($news->video_url); ?>

                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $youtubeID; ?>"></iframe>
                </div>

            <?php } ?>


            <p>
<!--                --><?php //echo strip_tags($news->description, '<p><b><h2><h3><h4><h5><h6><i><u><em><strong><blockqute><pre>'); ?>
                <?php echo $news->description; ?>
            </p>
        </div>
        <footer class="clearfix">
            <div class="link pull-right">
                <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
                    <li class="facebook">
                        <a class="share-button" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo base_url("haber/$news->url"); ?>&t=<?php echo $news->title; ?> Haberi"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="twitter">
                        <a class="share-button" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $news->title; ?>&url=<?php echo base_url("haber/$news->url"); ?>"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="linkedin">
                        <a class="share-button" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo base_url("haber/$news->url"); ?>"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </footer>
    </article>
    <!-- blogpost end -->

</div>
<?php
/*
* Template Name: Selected Anime
*
*/
get_header();
the_post();
?>

<div class="selected" style="background-image:url(<?= get_the_post_thumbnail_url() ?>)">
    <!-- content -->
    <div class="container" style="padding-bottom:50px">
        <div class="title">
            <div class="h2" style="color: white;">
                <?= get_the_title() ?>
            </div>
        </div>
    </div>
    <!-- news posts -->
</div>
<div class="container">
    <p style="margin-top:10px; ">
        <?= get_the_content() ?>
    </p>
</div>

<?php get_footer() ?>
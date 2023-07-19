<?php get_header() ?>

<div id="visual">
    <div class="cover">
        <div class="h1">
            ANIMER
        </div>
        <p class="">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, ullam!
        </p>
    </div>
</div>
<div class="container">
    <div class="title">
        <div class="h2">Recommended Anime</div>
    </div>
    <div class="deck">
        <?php
        $posts = get_posts([
            'posts_per_page' => 4,
            'post_type' => 'page'
        ]);
        foreach ($posts as $post) :
        ?>
            <div class="card">
                <div class="card-article">
                    <a href="<?= get_permalink($post) ?>" class="h3"><?= get_the_title($post) ?></a>
                    <p>
                        <?= wp_strip_all_tags($post->post_content) ?>
                    </p>
                    <a href="<?= get_permalink($post) ?>" class="btn">
                        Learn More
                    </a>
                </div>
                <div class="card-thumbnail">
                    <?= get_the_post_thumbnail($post) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php get_footer() ?>
<?php
add_action('login_enqueue_scripts', function () {
    wp_enqueue_style('login-custom-style', get_stylesheet_directory_uri() . '/css/login.css');
});

remove_action('welcome_panel', 'wp_welcome_panel');
add_action('admin_menu', function () {
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
});

add_action('init', function () {
    $post = get_post_type_object('post');
    foreach ($post->labels as $key => $value) {
        $value = str_replace('Post', 'Article', $value);
        $value = str_replace('post', 'article', $value);
        $post->labels->{$key} = $value;
    }

    $page = get_post_type_object('page');
    foreach ($page->labels as $key => $value) {
        $value = str_replace('Page', 'Anime', $value);
        $value = str_replace('page', 'anime', $value);
        $page->labels->{$key} = $value;
    }
});

add_action('wp_footer', function () {
    if (!is_admin()) {

        $scale = '1';
        $icon = '
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50.002" viewBox="0 0 13.229 13.23"><path d="M6.008 13.202a6.728 6.728 0 0 1-2.84-.947A6.93 6.93 0 0 1 .961 10.04C-.371 7.82-.315 5.104 1.109 2.963A6.602 6.602 0 0 1 9.572.7a6.834 6.834 0 0 1 2.685 2.466c1.292 2.108 1.297 4.735.012 6.873a6.93 6.93 0 0 1-2.206 2.216 6.674 6.674 0 0 1-4.055.947zM3.12 8.9c.067-.027.616-.559 1.796-1.738l1.7-1.697 1.699 1.697c1.18 1.18 1.729 1.71 1.795 1.738a.475.475 0 0 0 .556-.124c.157-.178.168-.388.032-.592-.04-.06-.909-.944-1.93-1.963-1.292-1.29-1.885-1.866-1.952-1.894a.549.549 0 0 0-.402 0c-.11.046-3.756 3.67-3.884 3.86-.094.142-.118.263-.079.394a.6.6 0 0 0 .274.323.57.57 0 0 0 .395-.004z"/></svg>
    ';

?>
        <a href="#" class="back-to-top">
            <div> <?= $icon ?> </div>
        </a>
        <style>
            .back-to-top svg {
                transform: scale(<?= $scale ?>);
            }

            .back-to-top {
                width: 50px;
                position: fixed;
                bottom: 0px;
                right: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 32px;
                text-decoration: none;
                opacity: 0;
                pointer-events: none;
                transition: all 0.4s;
                z-index: 20;
            }

            .back-to-top.active-to-top {
                bottom: 16px;
                pointer-events: auto;
                opacity: 1;
            }

            html {
                scroll-behavior: smooth;
            }

            .back-to-top div:hover {
                animation: btt 1s linear infinite alternate;
            }

            @keyframes btt {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(1);
                }
            }
        </style>
        <script>
            const toTop = document.querySelector('.back-to-top');
            window.addEventListener("scroll", () => {
                if (window.pageYOffset > 100) {
                    toTop.classList.add('active-to-top')
                } else {
                    toTop.classList.remove('active-to-top')
                }
            });
        </script>
<?php }
}, 100);

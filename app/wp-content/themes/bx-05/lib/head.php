<?php

add_theme_support('title-tag');
function set_my_title()
{
    if (is_404()) {
        $my_title = '見つかりませんでした';
    } elseif (is_archive()) {
        if (is_post_type_archive('news')) {
            $my_title = 'News';
        } elseif (is_post_type_archive('gallery')) {
            $my_title = 'Gallery';
        } elseif (is_post_type_archive('product')) {
            $my_title = 'Product';
        } elseif (is_post_type_archive('review')) {
            $my_title = 'Review';
        } elseif (is_post_type_archive('campaign')) {
            $my_title = 'Campaign';
        } elseif (is_category()) {
            $my_title = single_cat_title('', false);
        } elseif (is_tag()) {
            $my_title = '#' . single_tag_title('', false);
        } else {
            $my_title = 'ブログ';
        }
    } else {
        $my_title = get_the_title();
    }
    return $my_title;
}
function meta_title()
{
    $title = set_my_title();
    if (!is_front_page()) {
        $meta_title = $title . ' | ' . get_bloginfo('name');
    } else {
        $meta_title = get_bloginfo('name');
    }
    return $meta_title;
}
add_filter('pre_get_document_title', 'meta_title');

function get_page_title()
{
    global $post;
    $output = '<header class="c-page-heading"><h1 class="o-cover o-cover:headingInner">';
    if (is_404()) {
        $output .= 'Not Found.';
    } elseif (is_page()) {
        $output .= get_the_title();
    } elseif (is_archive()) {
        if (is_post_type_archive('news')) {
            $output .= 'News';
        } elseif (is_post_type_archive('gallery')) {
            $output .= 'Gallery';
        } elseif (is_post_type_archive('product')) {
            $output .= 'Product';
        } elseif (is_post_type_archive('review')) {
            $output .= 'Review';
        } elseif (is_post_type_archive('campaign')) {
            $output .= 'Campaign';
        } elseif (is_category()) {
            $output .= single_cat_title('', false);
        } elseif (is_tag()) {
            $output .= '#' . single_tag_title('', false);
        } else {
            $output .= 'Blog';
        }
    } elseif (is_single()) {
        if ('product' == get_post_type()) {
            $output .= 'Product';
        } elseif ('campaign' == get_post_type()) {
            $output .= 'Campaign';
        } else {
            $output .= get_the_title();
        }
    } else {
        $output .= get_the_title();
    }
    $output .= '</h1><picture class="o-frame o-frame:switch">';
    if (is_page()) {
        if (has_post_thumbnail()) {
            $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_the_post_thumbnail_url($post->ID, 'full') . '" decoding="async" alt="" width="100%" height="100%" />';
        } else {
            $output .= '<source type="image/avif"
        data-srcset="' . get_template_directory_uri() . '/img/hero.avif" />
    <source type="image/webp"
        data-srcset="' . get_template_directory_uri() . '/img/hero.webp" />
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
        data-src="' . get_template_directory_uri() . '/img/hero.png"
        decoding="async" alt="" width="100%" height="100%" />';
        }
    } elseif (is_single()) {
        if ('post' == get_post_type()) {
            if (has_post_thumbnail()) {
                $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_the_post_thumbnail_url($post->ID, 'full') . '" decoding="async" alt="" width="100%" height="100%" />';
            } else {
                $output .= '<source type="image/avif"
            data-srcset="' . get_template_directory_uri() . '/img/thumb.avif" />
        <source type="image/webp"
            data-srcset="' . get_template_directory_uri() . '/img/thumb.webp" />
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            data-src="' . get_template_directory_uri() . '/img/thumb.png"
            decoding="async" alt="" width="100%" height="100%" />';
            }
        } else {
            $output .= '<source type="image/avif"
        data-srcset="' . get_template_directory_uri() . '/img/hero.avif" />
    <source type="image/webp"
        data-srcset="' . get_template_directory_uri() . '/img/hero.webp" />
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
        data-src="' . get_template_directory_uri() . '/img/hero.png"
        decoding="async" alt="" width="100%" height="100%" />';
        }
    } else {
        $output .= '<source type="image/avif"
        data-srcset="' . get_template_directory_uri() . '/img/hero.avif" />
    <source type="image/webp"
        data-srcset="' . get_template_directory_uri() . '/img/hero.webp" />
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
        data-src="' . get_template_directory_uri() . '/img/hero.png"
        decoding="async" alt="" width="100%" height="100%" />';
    }
    $output .= '</picture></header>';
    return $output;
}
function my_robots()
{
    if ('0' != get_option('blog_public')) {
        $robots = 'noindex, nofollow';
        return '<meta name="robots" content="' . $robots .'">';
    }
}
function get_my_canonical()
{
    global $post;
    $canonical = '';
    if (is_404()) {
        $protocol = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
        $canonical = esc_url($protocol. $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
    } elseif (is_single() || is_page()) {
        $canonical = esc_url(get_permalink($post->ID));
    } elseif (is_archive()) {
        if (is_post_type_archive('news')) {
            $canonical = esc_url(home_url('/news'));
        } elseif (is_category()) {
            $cat = get_queried_object();
            $canonical = esc_url(get_category_link($cat->term_id));
        } else {
            $canonical = esc_url(home_url('/blog'));
        }
    } else {
        $canonical = home_url();
    }
    return $canonical;
}
function my_keywords()
{
    global $post;
    $keywords = '';
    $base_keywords = get_vars('site', 'keywords');
    if ($base_keywords) {
        $keywords .= $base_keywords[0];
        for ($i = 1; $i < count($base_keywords); $i++) {
            $keywords .= ',' . $base_keywords[$i];
        }
    }
    if (is_single() || is_page()) {
        $add_keywords = get_post_meta($post->ID, 'meta_keywords', true);
        if ($add_keywords) {
            $keywords .= ',' . $add_keywords;
        }
    }
    return $keywords;
}
function my_description()
{
    global $post;
    $output = '';
    if (is_single() || is_page()) {
        $meta_description = esc_html(get_post_meta($post->ID, 'meta_description', true));
        if (!empty($meta_description)) {
            if (mb_strlen($meta_description, 'UTF-8') > 200) {
                $output = mb_substr($meta_description, 0, 200, 'UTF-8') . '……';
            } else {
                $output = $meta_description;
            }
        } else {
            get_vars('site', 'description') ? $output = get_vars('site', 'description') : $output = get_bloginfo('description');
        }
    } else {
        get_vars('site', 'description') ? $output = get_vars('site', 'description') : $output = get_bloginfo('description');
    }
    return $output;
}
function my_ogp()
{
    global $post;
    $img_url = '';
    if (is_single() || is_page()) {
        $ogp_title = esc_html(get_the_title($post->ID));
    } else {
        $ogp_title = get_bloginfo('name');
    }
    if (is_single() || is_page()) {
        if (has_post_thumbnail()) {
            $img_url = get_the_post_thumbnail_url($post->ID, 'full');
        }
    }
    if (!$img_url) {
        $img_url = get_template_directory_uri() . '/img/ogp.png';
    }
    $ogp = '<meta property="og:locale" content="ja_JP">';
    $ogp .= '<meta property="og:description" content="' . my_description() . '">';
    $ogp .= '<meta property="og:type" content="' . get_ogp_type() . '">';
    $ogp .= '<meta property="og:title" content="'. $ogp_title . '">';
    $ogp .= '<meta property="og:url" content="' . get_my_canonical() . '">';
    $ogp .= '<meta property="og:site_name" content="' . get_vars('site', 'name') . '">';
    $ogp .= '<meta property="og:image" content="' . $img_url . '">';
    $ogp .= '<meta name="twitter:card" content="summary_large_image">';
    $ogp .= '<meta name="twitter:site" content="@' . get_vars('sns', 'twsite') . '">';
    $ogp .= '<meta name="twitter:description" content="' . my_description() . '">';
    $ogp .= '<meta name="twitter:title" content="' . $ogp_title . '">';
    $ogp .= '<meta name="twitter:creator" content="@' . get_vars('sns', 'twcreator') . '">';
    $ogp .= '<meta name="twitter:image:src" content="' . $img_url . '">';
    return $ogp;
}
function add_head()
{
    $inserts = '<meta content="telephone=no" name="format-detection" />';
    $inserts .= '<meta content="address=no" name="format-detection" />';
    $inserts .= '<meta name="keywords" content="' . my_keywords() . '" />';
    $inserts .= '<meta name="description" content="' . my_description() . '" />';
    $inserts .= my_robots();
    $inserts .= '<link rel="canonical" href="' . get_my_canonical() . '">';
    $inserts .= my_ogp();
    $inserts .= '<link rel="icon" href="' . get_template_directory_uri() . '/favicon.ico" />';
    $inserts .= '<link rel="apple-touch-icon" sizes="180×180" href="' .  home_url() . '/pwa/icons/icon-180x180.png" />';
    $inserts .= '<meta name="theme-color" content="' . get_vars('site', 'theme') . '" />';
    $inserts .= '<link rel="manifest" href="' . home_url() . '/manifest.json" />';
    $inserts .= '<meta name="apple-mobile-web-app-title" content="' . get_vars('site', 'name') . '">';
    $inserts .= '<meta name="apple-mobile-web-app-capable" content="yes">';
    $inserts .= '<meta name="apple-mobile-web-app-status-bar-style" content="default">';
    $inserts .= '<link rel="apple-touch-icon-precomposed" href="' . home_url() . '/pwa/icons/icon-512x512.png" />';
    echo $inserts;
}
add_action('wp_head', 'add_head');

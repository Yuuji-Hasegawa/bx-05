<?php

function set_bread_json()
{
    global $post;
    $array[] = array(
        "@type" => "ListItem",
        "position" => 1,
        "item" => array(
            "@id" => esc_url(home_url('/')),
            "name" => esc_attr("トップページ")
        )
    );
    if (is_404()) {
        $notfound[] = array(
            "@type" => "ListItem",
            "position" => 2,
            "item" => array(
                "@id" => esc_url(get_pagenum_link()),
                "name" => esc_html('ページが見つかりません。') . ' - ' . esc_html(get_bloginfo('name'))
            )
        );
        $array = array_merge($array, $notfound);
    } elseif (is_page()) {
        $i = 1;
        if ($post->post_parent != 0) {
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach ($ancestors as $ancestor) {
                $pageName = get_the_title($ancestor);
                $pageId = get_permalink($ancestor);
                $i++;
                $page_json[] = array(
                    "@type" => "ListItem",
                    "position" => $i,
                    "item" => array(
                        "@id" => esc_url($pageId),
                        "name" => esc_html($pageName)
                    )
                );
            }
        }
        $i++;
        $page[] = array(
            "@type" => "ListItem",
            "position" => $i,
            "item" => array(
                "@id" => esc_url(get_permalink($post->ID)),
                "name" => esc_html(get_the_title($post->ID))
            )
        );
        $array = array_merge($array, $page);
    } elseif (is_archive()) {
        if (is_post_type_archive('news')) {
            $child[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => esc_url(home_url('/news')),
                    "name" => esc_attr('news')
                )
            );
            $array = array_merge($array, $child);
        } elseif (is_post_type_archive('gallery')) {
            $child[] = array(
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => array(
                        "@id" => esc_url(home_url('/gallery')),
                        "name" => esc_attr('gallery')
                    )
                );
            $array = array_merge($array, $child);
        } elseif (is_post_type_archive('review')) {
            $child[] = array(
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => array(
                        "@id" => esc_url(home_url('/review')),
                        "name" => esc_attr('review')
                    )
                );
            $array = array_merge($array, $child);
        } elseif (is_post_type_archive('product')) {
            $child[] = array(
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => array(
                        "@id" => esc_url(home_url('/product')),
                        "name" => esc_attr('product')
                    )
                );
            $array = array_merge($array, $child);
        } elseif (is_post_type_archive('campaign')) {
            $child[] = array(
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => array(
                        "@id" => esc_url(home_url('/campaign')),
                        "name" => esc_attr('campaign')
                    )
                );
            $array = array_merge($array, $child);
        } elseif (is_tag()) {
            $parent[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => esc_url(home_url('/blog')),
                    "name" => esc_attr('ブログ')
                )
            );
            $child[] = array(
                "@type" => "ListItem",
                "position" => 3,
                "item" => array(
                    "@id" => esc_url(get_term_link(get_queried_object_id($post->ID))),
                    "name" => esc_attr(single_term_title('#', false))
                )
            );
            $array = array_merge($array, $parent, $child);
        } elseif (is_category()) {
            $parent[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => esc_url(home_url('/blog')),
                    "name" => esc_attr('ブログ')
                )
            );
            $cat = get_the_category($post->ID);
            $i = 2;
            if (!empty($cat)) {
                $cat_id = $cat[0]->cat_ID;
                $ancestors = get_ancestors($cat_id, 'category');
                $reversed_ancestors = array_reverse($ancestors);
                foreach ($reversed_ancestors as $ancestor) {
                    $pageName = get_cat_name($ancestor);
                    $pageId = get_category_link($ancestor);
                    $i++;
                    $cat_array[] = array(
                            "@type" => "ListItem",
                            "position" => $i,
                            "item" => array(
                                "@id" => esc_url($pageId),
                                "name" => esc_html($pageName)
                            )
                        );
                }
            }
            $i++;
            $last_cat[] = array(
                    "@type" => "ListItem",
                    "position" => $i,
                    "item" => array(
                        "@id" => esc_url(get_category_link($cat[0]->term_id)),
                        "name" => esc_attr($cat[0]->cat_name)
                    )
                );
            if (!empty($cat_array)) {
                $array = array_merge($array, $parent, $cat_array, $last_cat);
            } else {
                $array = array_merge($array, $parent, $last_cat);
            }
        } else {
            $parent[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => esc_url(home_url('/blog')),
                    "name" => esc_attr('ブログ')
                )
            );
            $array = array_merge($array, $parent);
        }
    } elseif (is_single()) {
        if ('news' == get_post_type()) {
            $parent[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => esc_url(home_url('/news')),
                    "name" => esc_attr('news')
                )
            );
            $child[] = array(
                "@type" => "ListItem",
                "position" => 3,
                "item" => array(
                    "@id" => esc_url(get_permalink($post->ID)),
                    "name" => esc_html(get_the_title($post->ID))
                )
            );
            $array = array_merge($array, $parent, $child);
        } elseif ('product' == get_post_type()) {
            $parent[] = array(
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => array(
                        "@id" => esc_url(home_url('/product')),
                        "name" => esc_attr('product')
                    )
                );
            $child[] = array(
                    "@type" => "ListItem",
                    "position" => 3,
                    "item" => array(
                        "@id" => esc_url(get_permalink($post->ID)),
                        "name" => esc_html(get_the_title($post->ID))
                    )
                );
            $array = array_merge($array, $parent, $child);
        } elseif ('campaign' == get_post_type()) {
            $parent[] = array(
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => array(
                        "@id" => esc_url(home_url('/campaign')),
                        "name" => esc_attr('campaign')
                    )
                );
            $child[] = array(
                    "@type" => "ListItem",
                    "position" => 3,
                    "item" => array(
                        "@id" => esc_url(get_permalink($post->ID)),
                        "name" => esc_html(get_the_title($post->ID))
                    )
                );
            $array = array_merge($array, $parent, $child);
        } elseif (is_attachment()) {
            $attachment[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => esc_url(get_permalink($post->ID)),
                    "name" => esc_attr('添付ファイルのページ')
                )
            );
            $array = array_merge($array, $attachment);
        } else {
            $parent[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => esc_url(home_url('/blog')),
                    "name" => esc_attr('ブログ')
                )
            );
            $cat = get_the_category($post->ID);
            $i = 2;
            if (!empty($cat)) {
                $cat_id = $cat[0]->cat_ID;
                $ancestors = get_ancestors($cat_id, 'category');
                $reversed_ancestors = array_reverse($ancestors);
                foreach ($reversed_ancestors as $ancestor) {
                    $pageName = get_cat_name($ancestor);
                    $pageId = get_category_link($ancestor);
                    $i++;
                    $cat_array[] = array(
                    "@type" => "ListItem",
                    "position" => $i,
                    "item" => array(
                        "@id" => esc_url($pageId),
                        "name" => esc_html($pageName)
                    )
                );
                }
            }
            $i++;
            $last_cat[] = array(
              "@type" => "ListItem",
              "position" => $i,
              "item" => array(
                "@id" => esc_url(get_category_link($cat[0]->term_id)),
                "name" => esc_attr($cat[0]->cat_name)
              )
            );
            $i++;
            $single[] = array(
                "@type" => "ListItem",
                "position" => $i,
                "item" => array(
                    "@id" => esc_url(get_permalink($post->ID)),
                    "name" => esc_html(get_the_title($post->ID))
                )
            );
            if (!empty($cat_array)) {
                $array = array_merge($array, $parent, $cat_array, $last_cat, $single);
            } else {
                $array = array_merge($array, $parent, $last_cat, $single);
            }
        }
    }
    if ($array) {
        $bread_array = array(
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => $array
        );
        return $bread_array;
    }
}
function set_content_json()
{
    global $post;
    $img_url = '';
    $img_w = '';
    $img_h = '';
    $cat_name = '';
    if (has_post_thumbnail()) {
        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        $img_url = $img_src[0];
        $img_w = $img_src[1];
        $img_h = $img_src[2];
    } else {
        $img_url = get_template_directory_uri() .'/img/ogp.png';
        $img_w = '1200';
        $img_h = '630';
    }
    if ('news' == get_post_type()) {
        $cat_name = 'news';
    } elseif ('campaign' == get_post_type()) {
        $cat_name = 'campaign';
    } elseif ('product' == get_post_type()) {
        $cat_name = 'product';
    } elseif (get_the_category($post->ID)) {
        $cat = get_the_category($post->ID);
        $cat_name = $cat[0]->cat_name;
    } else {
        $cat_name = 'ブログ';
    }
    $array = array(
        "@context" => "http://schema.org",
        "@type" => "NewsArticle",
        "mainEntityOfPage" => array(
            "@type" => "WebPage",
            "@id" => esc_url(get_permalink($post->ID))
        ),
        "name" => esc_html(get_the_title($post->ID)),
        "headline" => esc_html(get_the_title($post->ID)),
        "image" => array(
            array(
                "@type" => "ImageObject",
                "url" => esc_url($img_url),
                "width" => $img_w,
                "height" => $img_h
            )
        ),
        "articleSection" => esc_html($cat_name),
        "datePublished" => get_the_time('c'),
        "dateModified" => get_the_modified_time('c'),
        "author" => array(
            "@type" => "Person",
            "name" => esc_attr('長谷川 雄治'),
            "sameAs" => ["https://www.facebook.com/yuuji.hasegawa","https://twitter.com/kamenwriter01","https://www.instagram.com/kamenwriter/","https://note.com/kamenwriter"]
        ),
        "publisher" => array(
            "@type" => "Organization",
            "name" => esc_attr('BBN'),
            "logo" => array(
                "@type" => "ImageObject",
                "url" => esc_url(get_template_directory_uri() . '/img/logo.svg'),
                "width" => 32,
                "height" => 21
            ),
            "sameAs" => ["https://bbns.jp", "https://twitter.com/bluebnose"]
        ),
        "description" => my_description()
    );
    if ($array) {
        return $array;
    }
}

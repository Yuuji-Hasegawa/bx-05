<?php

function get_thumb()
{
    global $post;
    $output = '<picture class="o-frame">';
    if (has_post_thumbnail()) {
        $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_the_post_thumbnail_url($post->ID, 'full') . '" decoding="async" alt="" width="100%" height="100%" alt="" />';
    } else {
        $output .= '
            <source data-srcset="' . get_template_directory_uri() . '/img/thumb.avif" type="image/avif" />
                    <source data-srcset="' . get_template_directory_uri() . '/img/thumb.webp" type="image/webp" />
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        data-src="' . get_template_directory_uri() . '/img/thumb.png" alt="" />';
    }
    $output .= '</picture>';
    return $output;
}
function get_ogp_type()
{
    is_single() ? $og_type = 'article' : $og_type = 'website';
    return $og_type;
}
/* shortcode */
function shortcode_url()
{
    return home_url();
}
add_shortcode('url', 'shortcode_url');

function shortcode_templateurl()
{
    return get_template_directory_uri();
}
add_shortcode('template_url', 'shortcode_templateurl');

function get_post_cat()
{
    global $post;
    $output = "";
    $cat = get_the_category($post->ID);
    if ($cat && !is_wp_error($cat)) {
        $output = '<a class="c-link c-link:bottomCat" href="' . get_category_link($cat[0]->term_id) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
        <path
            d="M147.8 192H480V144C480 117.5 458.5 96 432 96h-160l-64-64h-160C21.49 32 0 53.49 0 80v328.4l90.54-181.1C101.4 205.6 123.4 192 147.8 192zM543.1 224H147.8C135.7 224 124.6 230.8 119.2 241.7L0 480h447.1c12.12 0 23.2-6.852 28.62-17.69l96-192C583.2 249 567.7 224 543.1 224z"
            fill="currentColor" />
    </svg>' . $cat[0]->cat_name . '</a>';
    }
    if ($output) {
        return $output;
    }
}
function get_loop_cat()
{
    global $post;
    $output = "";
    $cat = get_the_category($post->ID);
    if ($cat && !is_wp_error($cat)) {
        $output = '<a class="c-cat-link" href="' . get_category_link($cat[0]->term_id) . '">' . $cat[0]->cat_name . '</a>';
    }
    if ($output) {
        return $output;
    }
}
function get_post_tags()
{
    global $post;
    $output = "";
    $tags = wp_get_object_terms($post->ID, 'post_tag');
    if ($tags && ! is_wp_error($tags)) {
        $output = '<div class="o-cluster">';
        foreach ($tags as $tagname) {
            $output .= '<a href="' . get_term_link($tagname) . '" rel="tag" class="c-link c-link:tag">' . $tagname->name . '</a>';
        }
        $output .= '</div>';
    }
    if ($output) {
        return $output;
    }
}
function my_human_time_diff($from, $to = '')
{
    if (empty($to)) {
        $to = time();
    }
    $diff = (int) abs($to - $from);
    // 条件: 3600秒 = 1時間以下なら (元のまま)
    if ($diff <= 3600) {
        $mins = round($diff / 60);
        if ($mins <= 1) {
            $mins = 1;
        }
        $since = sprintf(_n('%s min', '%s mins', $mins), $mins);
    }
    // 条件: 86400秒 = 24時間以下かつ、3600秒 = 1時間以上なら (元のまま)
    elseif (($diff <= 86400) && ($diff > 3600)) {
        $hours = round($diff / 3600);
        if ($hours <= 1) {
            $hours = 1;
        }
        $since = sprintf(_n('%s hour', '%s hours', $hours), $hours);
    }
    // 条件: 604800秒 = 7日以下かつ、86400秒 = 24時間以上なら (条件追加)
    elseif (($diff <= 604800) && ($diff > 86400)) {
        $days = round($diff / 86400);
        if ($days <= 1) {
            $days = 1;
        }
        $since = sprintf(_n('%s day', '%s days', $days), $days);
    }
    // 条件: 2678400秒 = 31日以下かつ、2678400秒 = 7日以上なら (条件追加)
    elseif (($diff <= 2678400) && ($diff > 604800)) {
        $weeks = round($diff / 604800);
        if ($weeks <= 1) {
            $weeks = 1;
        }
        $since = sprintf(_n('%s週間', '%s週間', $weeks), $weeks);
    }
    // 条件: 31536000秒 = 365日以下かつ、2678400秒 = 31日以上なら (条件追加)
    elseif (($diff <= 31536000) && ($diff > 2678400)) {
        $months = round($diff / 2678400);
        if ($months <= 1) {
            $months = 1;
        }
        $since = sprintf(_n('約%sヶ月', '約%sヶ月', $months), $months);
    }
    // 条件: 31536000秒 = 365日以上なら (条件追加)
    elseif ($diff >= 31536000) {
        $years = round($diff / 31536000);
        if ($years <= 1) {
            $years = 1;
        }
        $since = sprintf(_n('約%s年', '約%s年', $years), $years);
    }
    return $since;
}

function get_vars($parent = '', $child = '')
{
    $json = file_get_contents(get_template_directory() . '/lib/setting.json');
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json, true);
    $output = $arr[$parent][$child];
    if ($output) {
        return $output;
    }
}
function get_service_list()
{
    $services = get_vars('company', 'service');
    $output = '';
    if ($services) {
        $output = '<ul class="c-list">';
        for ($i = 0; $i < count($services); $i++) {
            $output .= '<li>' . $services[$i] . '</li>';
        }
        $output .= '<li>その他、上記に係る業務</li></ul>';
    }
    if ($output) {
        return $output;
    }
}
function get_total_review()
{
    $output = '<div class="o-cluster o-cluster:totalReview">';
    $args = array(
        'post_type' => 'review',
        'posts_per_page' => -1,
    );
    $the_query = new WP_Query($args);
    $count = $the_query->found_posts;
    $tmp = 0;
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $rating = intval(get_post_meta(get_the_ID(), 'review_rate', true));
            if (is_int($rating)) {
                $tmp += $rating;
            }
        }
        wp_reset_postdata();
    }
    $avg = $tmp / $count;
    $output .= '<div class="c-review-star c-review-star:total" data-rate="' . floor($avg) . '" aria-label="' . (floor($avg * 100) / 100) . ' stars out of 5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" fill="currentColor" /></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" fill="currentColor" /></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" fill="currentColor" /></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" fill="currentColor" /></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z" fill="currentColor" /></svg></div>';
    $output .= '<span class="c-total-rating">' . (floor($avg * 100) / 100) . '</span>';
    $output .= '<span class="o-has-icon o-has-icon:comment"><span class="c-comment-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 31.1c-141.4 0-255.1 93.12-255.1 208c0 49.62 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734c1.249 3 4.021 4.766 7.271 4.766c66.25 0 115.1-31.76 140.6-51.39c32.63 12.25 69.02 19.39 107.4 19.39c141.4 0 255.1-93.13 255.1-207.1S397.4 31.1 256 31.1zM127.1 271.1c-17.75 0-32-14.25-32-31.1s14.25-32 32-32s32 14.25 32 32S145.7 271.1 127.1 271.1zM256 271.1c-17.75 0-31.1-14.25-31.1-31.1s14.25-32 31.1-32s31.1 14.25 31.1 32S273.8 271.1 256 271.1zM383.1 271.1c-17.75 0-32-14.25-32-31.1s14.25-32 32-32s32 14.25 32 32S401.7 271.1 383.1 271.1z" fill="currentColor" /></svg></span><span class="c-comment-count">' . $count . '</span>件</span></div>';
    return $output;
}

<?php

function get_front_content()
{
    $output = '';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
        'no_found_rows' => true
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output = '<ul class="o-switcher o-switcher:frontTopic">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $output .= '<li class="o-stack o-stack:s">
            <a href="' . get_the_permalink() . '">
                ' . get_thumb() . '
            </a>
            <h3 class="c-trim-title"><a class="c-trim-title__link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
            <footer class="o-stack o-stack:topicFooter">
                ' . get_loop_cat() . '
                <time class="c-topic-date" datetime="' . get_the_time('Y-m-d') . '">' . my_human_time_diff(get_post_time('U', true)) . '前</time>
            </footer>
        </li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
        $output .= '<a href="' . home_url('/blog') .'"
        class="c-btn c-btn:topicList">
        コンテンツ一覧
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
            <path
                d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                fill="currentColor"></path>
        </svg>
    </a>';
    }
    if ($output) {
        return $output;
    } else {
        return '<p>コンテンツはまだありません。</p>';
    }
}
function get_front_product()
{
    $output = '';
    $args = array(
        'post_type' => 'product',
        'no_found_rows' => true,
        'posts_per_page' => 8,
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output .= '<ul class="o-switcher o-switcher:product">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $price = number_format(intval(get_post_meta(get_the_ID(), 'product_price', true)));
            $price ? $price = '&yen' . $price : $price = '時価';
            $output .= '<li>
                <a class="o-cover o-cover:productLink" href="' . get_the_permalink() .'">
                    <span class="o-stack o-stack:productLink">
                        <span class="c-product-name">' . get_the_title() . '</span>
                        <span class="c-product-price">' . $price . '</span>
                    </span>
                    <picture class="o-frame o-frame:square">';
            if (has_post_thumbnail()) {
                $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') .'" decoding="async" alt="" width="100%" height="100%" />';
            } else {
                $output .= '<source data-srcset="' . get_template_directory_uri() . '/img/thumb.avif" type="image/avif" /><source data-srcset="' . get_template_directory_uri() . '/img/thumb.webp" type="image/webp" /><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_template_directory_uri() . '/img/thumb.png" alt="" />';
            }
            $output .= '</picture></a></li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
        $output .= '<a href="' . home_url('/product') .'"
        class="c-btn c-btn:frontProduct">
        PRODUCT
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
            <path
                d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                fill="currentColor"></path>
        </svg>
    </a>';
    }
    if ($output) {
        return $output;
    } else {
        return '<p>商品はまだありません。</p>';
    }
}

function get_front_review()
{
    $output = '';
    $args = array(
        'post_type' => 'review',
        'orderby' => 'date',
        'order' => 'DESC',
        'no_found_rows' => true,
        'posts_per_page' => 3,
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output .= '<ul class="o-stack o-stack:review u-mb-m">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $output .= '<li class="c-review-item"><header class="o-cluster o-cluster:reviewer"><span class="c-review-pict"><picture class="o-frame o-frame:square">';
            if (has_post_thumbnail()) {
                $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') .'" decoding="async" alt="" width="100%" height="100%" />';
            } else {
                $output .= '<source data-srcset="' . get_template_directory_uri() . '/img/profile.avif" type="image/avif" /><source data-srcset="' . get_template_directory_uri() . '/img/profile.webp" type="image/webp" /><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_template_directory_uri() . '/img/profile.png" alt="" />';
            }
            $output .= '</picture></span><span class="c-review-name">' . get_the_title() . '</span><time class="c-review-time" datetime="' . get_the_time('Y-m-d') . '">' . my_human_time_diff(get_post_time('U', true)) . '前</time></header>';
            $rating = intval(get_post_meta(get_the_ID(), 'review_rate', true));
            $output .= '<div class="c-review-star"
            data-rate="' . $rating . '"
            aria-label="' . $rating . ' stars out of 5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"
                    fill="currentColor" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"
                    fill="currentColor" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"
                    fill="currentColor" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"
                    fill="currentColor" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"
                    fill="currentColor" />
            </svg>
        </div>';
            $output .= '<div class="c-review-body">' . get_the_content() . '</div></li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
        $output .= '<a href="' . home_url('/review') . '" class="c-btn c-btn:topicList">全ての口コミ<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.--><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" fill="currentColor"></path></svg></a>';
    }
    if ($output) {
        return $output;
    } else {
        return '<p>口コミはまだありません。</p>';
    }
}
function get_related_product()
{
    global $post;
    $output = '';
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'no_found_rows' => true,
        'orderby' => 'rand',
        'post__not_in' => array($post->ID),
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output = '<h3 class="c-min-heading">その他の商品</h3><ul class="o-switcher o-switcher:product u-mb-l">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $price = number_format(intval(get_post_meta(get_the_ID(), 'product_price', true)));
            $price ? $price = '&yen' . $price : $price = '時価';
            $output .= '<li>
                <a class="o-cover o-cover:productLink" href="' . get_the_permalink() .'">
                    <span class="o-stack o-stack:productLink">
                        <span class="c-product-name">' . get_the_title() . '</span>
                        <span class="c-product-price">' . $price . '</span>
                    </span>
                    <picture class="o-frame o-frame:square">';
            if (has_post_thumbnail()) {
                $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') .'" decoding="async" alt="" width="100%" height="100%" />';
            } else {
                $output .= '<source data-srcset="' . get_template_directory_uri() . '/img/thumb.avif" type="image/avif" /><source data-srcset="' . get_template_directory_uri() . '/img/thumb.webp" type="image/webp" /><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_template_directory_uri() . '/img/thumb.png" alt="" />';
            }
            $output .= '</picture></a></li>';
        }
        wp_reset_postdata();
        $output .= '</ul>';
    }
    if ($output) {
        return $output;
    }
}

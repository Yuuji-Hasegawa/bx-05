<?php get_header(); if (have_posts()):?>
<div class="o-container o-container:underPage">
    <div class="c-inner-wrap u-pt-l">
        <h2 class="c-heading">
            <?php the_title();?>
        </h2>
        <div class="c-insert-img">
            <?php echo get_thumb();?>
        </div>
        <?php while (have_posts()): the_post();?>
        <article class="c-entry">
            <?php
                the_content();
                $price = number_format(intval(get_post_meta($post->ID, 'product_price', true)));
                $price ? $price = '&yen' . $price : $price = '時価';
                echo '<span class="c-product-price">' . $price . '</span>';
            ?>
        </article>
        <?php endwhile;?>
        <div class="c-input-copy">
            <input id="shareURL" class="c-input c-input:share" type="text"
                value="<?php echo esc_url(get_permalink($post->ID));?>"
                readonly="true" />
            <button id="shareBtn" class="c-btn c-btn:copy">コピー</button>
        </div>
    </div>
    <aside class="u-mb-l">
        <?php echo get_related_product();?>
        <a href="<?php echo home_url('/product');?>"
            class="c-btn c-btn:topicList">
            商品一覧へ戻る
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
                <path
                    d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                    fill="currentColor"></path>
            </svg>
        </a>
    </aside>
</div>
<?php endif;get_footer();

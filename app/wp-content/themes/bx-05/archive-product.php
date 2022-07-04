<?php get_header();?>
<div class="o-container o-container:underPage u-pt-l u-pb-l">
    <?php if (have_posts()):?>
    <ul class="o-switcher o-switcher:product">
        <?php while (have_posts()): the_post();?>
        <li>
            <?php
            $price = number_format(intval(get_post_meta($post->ID, 'product_price', true)));
            $price ? $price = '&yen' . $price : $price = '時価';
            ?>
            <a class="o-cover o-cover:productLink"
                href="<?php the_permalink();?>">
                <span class="o-stack o-stack:productLink">
                    <span class="c-product-name"><?php the_title();?></span>
                    <span class="c-product-price"><?php echo $price;?></span>
                </span>
                <picture class="o-frame o-frame:square">
                    <?php
                        if (has_post_thumbnail()) {
                            echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_the_post_thumbnail_url($post->ID, 'full') .'" decoding="async" alt="" width="100%" height="100%" />';
                        } else {
                            echo '<source data-srcset="' . get_template_directory_uri() . '/img/thumb.avif" type="image/avif" /><source data-srcset="' . get_template_directory_uri() . '/img/thumb.webp" type="image/webp" /><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_template_directory_uri() . '/img/thumb.png" alt="" />';
                        }
                    ?>
                </picture>
            </a>
        </li>
        <?php endwhile;?>
    </ul>
    <?php endif;
    echo get_pagination();?>
</div>
<?php get_footer();

<?php get_header();?>
<div class="o-container o-container:underPage u-pt-l u-pb-l">
    <?php if (have_posts()):?>
    <ul class="o-cluster o-cluster:gallery">
        <?php while (have_posts()): the_post();?>
        <li>
            <?php
                if (has_post_thumbnail()) {
                    $img_url = get_the_post_thumbnail_url($post->ID, 'full');
                } else {
                    $img_url = get_template_directory_uri() . '/img/thumb.png';
                }
            ?>
            <a data-fslightbox="gallery"
                href="<?php echo $img_url;?>">
                <picture class="o-frame o-frame:square">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        data-src="<?php echo $img_url;?>"
                        decoding="async" alt="" width="100%" height="100%" />
                </picture>
            </a>
        </li>
        <?php endwhile;?>
    </ul>
    <?php endif;
    echo get_pagination();?>
</div>
<?php get_footer();

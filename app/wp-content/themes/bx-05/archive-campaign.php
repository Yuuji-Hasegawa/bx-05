<?php get_header();?>
<div class="o-container o-container:underPage u-pt-l u-pb-l">
    <?php if (have_posts()):?>
    <ul class="o-switcher o-switcher:frontTopic">
        <?php while (have_posts()): the_post();?>
        <li class="o-stack o-stack:s">
            <a href="<?php the_permalink();?>">
                <?php echo get_thumb();?>
            </a>
            <h3 class="c-trim-title"><a class="c-trim-title__link"
                    href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <?php
                $start = date_create(get_post_meta($post->ID, 'campaign_start', true));
                $end = date_create(get_post_meta($post->ID, 'campaign_end', true));
                if (strtotime(date("Y-m-d")) > strtotime(date_format($end, 'Y-m-d'))) {
                    echo '<span class="c-campaign-badge c-campaign-badge:end">終了</span>';
                } else {
                    echo '<span class="c-campaign-badge">実施中</span>';
                }
            ?>
            <div class="o-cluster o-cluster:xxs">
                <time
                    datetime="<?php echo date_format($start, 'Y-m-d');?>">
                    <?php echo date_format($start, 'Y.m.d');?>
                </time>
                〜
                <time
                    datetime="<?php echo date_format($end, 'Y-m-d');?>">
                    <?php echo date_format($end, 'Y.m.d'); ?>
                </time>
            </div>
        </li>
        <?php endwhile;?>
    </ul>
    <?php endif;
    echo get_pagination();?>
</div>
<?php get_footer();

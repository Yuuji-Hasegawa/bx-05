<?php get_header(); if (have_posts()):?>
<div class="o-container o-container:underPage">
    <div class="c-inner-wrap u-pt-l u-pb-l">
        <h2 class="c-heading">
            <?php the_title();?>
        </h2>
        <div class="c-insert-img">
            <?php echo get_thumb();?>
        </div>
        <?php while (have_posts()): the_post();?>
        <article class="c-entry u-mb-m">
            <?php the_content();?>
        </article>
        <?php
            $start = date_create(get_post_meta($post->ID, 'campaign_start', true));
            $end = date_create(get_post_meta($post->ID, 'campaign_end', true));
        ?>
        <div class="o-cluster o-cluster:xxs u-mb-m">
            <time
                datetime="<?php echo date_format($start, 'Y-m-d');?>">
                <?php echo date_format($start, 'Y.m.d');?>
            </time>
            〜
            <time
                datetime="<?php echo date_format($end, 'Y-m-d');?>">
                <?php echo date_format($end, 'Y.m.d'); ?>
            </time>
            まで
        </div>
        <?php
            if (strtotime(date("Y-m-d")) > strtotime(date_format($end, 'Y-m-d'))) {
                echo '<span class="c-campaign-badge c-campaign-badge:end">終了</span>';
            } else {
                echo '<span class="c-campaign-badge">実施中</span>';
            }
        ?>
        <?php endwhile;?>
        <div class="c-input-copy">
            <input id="shareURL" class="c-input c-input:share" type="text"
                value="<?php echo esc_url(get_permalink($post->ID));?>"
                readonly="true" />
            <button id="shareBtn" class="c-btn c-btn:copy">コピー</button>
        </div>
    </div>
</div>
<?php endif;get_footer();

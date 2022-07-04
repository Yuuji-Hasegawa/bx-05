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
            <footer class="o-stack o-stack:topicFooter">
                <?php echo get_loop_cat();?>
                <time class="c-topic-date"
                    datetime="<?php the_time('Y-m-d')?>"><?php echo my_human_time_diff(get_post_time('U', true));?>前</time>
            </footer>
        </li>
        <?php endwhile;?>
    </ul>
    <?php endif;
    echo get_pagination();?>
</div>
<?php get_footer();

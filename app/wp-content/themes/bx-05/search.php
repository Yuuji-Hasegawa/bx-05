<?php get_header();?>
<div class="o-container o-container:underPage u-pt-l u-pb-l">
    <?php if (have_posts()):?>
    <p class="u-mb-m">
        <?php found_result_count();?>
    </p>
    <ul class="o-stack o-stack:news">
        <?php while (have_posts()): the_post();?>
        <li class="o-switcher o-switcher:news">
            <time
                datetime="<?php the_time('Y-m-d')?>"><?php the_time('Y.m.d');?></time>
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </li>
        <?php endwhile;?>
    </ul>
    <?php else:?>
    <p class="u-mb-m">「<?php echo get_search_query();?>」でヒットするコンテンツは見つかりませんでした。</p>
    <a class="c-btn c-btn:hasIcon" href="<?php echo home_url();?>">
        トップページへ戻る
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
            <path
                d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                fill="currentColor" />
        </svg>
    </a>
    <?php endif;
    echo get_pagination();?>
</div>
<?php get_footer();

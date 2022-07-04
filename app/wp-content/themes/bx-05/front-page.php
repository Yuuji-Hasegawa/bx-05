<?php get_header();?>
<div class="c-front-box">
    <h2 class="c-heading c-heading:mlt">News</h2>
    <div class="o-container o-container:innerWrap">
        <?php if (have_posts()):?>
        <ul class="o-stack o-stack:news">
            <?php while (have_posts()): the_post();?>
            <li class="o-switcher o-switcher:news">
                <time
                    datetime="<?php the_time('Y-m-d')?>"><?php the_time('Y.m.d');?></time>
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </li>
            <?php endwhile;?>
        </ul>
        <a class="o-has-icon o-has-icon:goList"
            href="<?php echo home_url('/news');?>">
            ニュース一覧
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
                <path
                    d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                    fill="currentColor"></path>
            </svg>
        </a>
        <?php else:?>
        <p>お知らせはまだありません。</p>
        <?php endif;?>
    </div>
</div>
<div class="c-front-box c-front-box:product">
    <h2 class="c-heading c-heading:frontProduct">Product</h2>
    <div class="o-container o-container:main">
        <?php echo get_front_product();?>
    </div>
</div>
<div class="c-front-box c-front-box:border-bottom">
    <h2 class="c-heading c-heading:mlt">Review</h2>
    <div class="o-container o-container:main">
        <?php echo get_total_review();
        echo get_front_review();?>
    </div>
</div>
<div class="c-front-box">
    <h2 class="c-heading c-heading:mlt">Access</h2>
    <div class="o-container o-container:innerWrap">
        <dl class="c-table c-table:ghost u-mb-m">
            <dt class="c-table__title c-table__title:ghost">所在地</dt>
            <dd class="c-table__content c-table__content:ghost">
                〒<?php echo get_vars('company', 'zip');?><br />
                <?php echo get_vars('company', 'address');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">営業時間</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('company', 'open');?>〜<?php echo get_vars('company', 'close');?>（L.0
                <?php echo get_vars('store', 'l.o');?>）
            </dd>
            <dt class="c-table__title c-table__title:ghost">定休日</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('company', 'dayoff');?>
            </dd>
        </dl>
        <a href="<?php echo home_url('/inquiry');?>"
            class="c-btn c-btn:envelop">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"
                    fill="currentColor" />
            </svg>
            お問い合わせ
        </a>
    </div>
</div>
<div class="c-map-embed">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.992643865924!2d135.49217391523234!3d34.70536548043322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68e55df1f63%3A0xd58f533a3a832867!2z44CSNTMwLTAwMTEg5aSn6Ziq5bqc5aSn6Ziq5biC5YyX5Yy65aSn5rex55S677yT4oiS77yR!5e0!3m2!1sja!2sjp!4v1656471426814!5m2!1sja!2sjp"
        style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%"
        height="450"></iframe>
</div>
<div class="c-front-box">
    <h2 class="c-heading c-heading:mlt">What's New</h2>
    <div class="o-container o-container:main">
        <?php echo get_front_content();?>
    </div>
</div>
<?php get_footer();

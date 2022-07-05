<?php get_header();?>
<div class="c-front-box">
    <h2 class="c-heading c-heading:mrn">Information</h2>
    <div class="o-container o-container:innerWrap">
        <dl class="c-table c-table:ghost u-mb-m">
            <dt class="c-table__title c-table__title:ghost">営業時間</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('company', 'open');?>〜<?php echo get_vars('company', 'close');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">定休日</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('company', 'dayoff');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">所在地</dt>
            <dd class="c-table__content c-table__content:ghost">
                〒<?php echo get_vars('company', 'zip');?><br />
                <?php echo get_vars('company', 'address');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">お支払い方法</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_pay_list();?>
            </dd>
        </dl>
        <div class="o-stack o-stack:phone u-mb-m">
            <span class="c-min-heading c-min-heading:center">ご予約・お問い合わせ</span>
            <a class="o-has-icon o-has-icon:tel"
                href="tel:<?php echo get_vars('company', 'tel');?>">
                <span class="c-menu-telIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M320 0H64C37.49 0 16 21.49 16 48v416C16 490.5 37.49 512 64 512h256c26.51 0 48-21.49 48-48v-416C368 21.49 346.5 0 320 0zM192 464c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 464 192 464z"
                            fill="currentColor" />
                    </svg>
                </span>
                <?php echo get_vars('company', 'tel');?>
            </a>
            <span class="c-tel-notice">受付時間 平日<?php echo get_vars('company', 'open');?>〜<?php echo get_vars('company', 'close');?></span>
        </div>
        <a href="<?php echo home_url('/inquiry');?>"
            class="c-btn c-btn:envelop">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"
                    fill="currentColor"></path>
            </svg>
            お問い合わせ
        </a>
    </div>
</div>
<div class="c-map-embed">
    <span class="o-frame o-frame:gmap">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.992643865924!2d135.49217391523234!3d34.70536548043322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68e55df1f63%3A0xd58f533a3a832867!2z44CSNTMwLTAwMTEg5aSn6Ziq5bqc5aSn6Ziq5biC5YyX5Yy65aSn5rex55S677yT4oiS77yR!5e0!3m2!1sja!2sjp!4v1656471426814!5m2!1sja!2sjp"
            style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%"
            height="100%"></iframe>
    </span>
</div>
<div class="c-front-box c-front-box:plan">
    <h2 class="c-heading c-heading:mrn">Plan</h2>
    <div class="o-container o-container:main">
        <ul class="o-switcher o-switcher:halfQuart u-mb-l">
            <li class="o-stack o-stack:planCard">
                <picture class="o-frame">
                    <source type="image/avif"
                        data-srcset="<?php echo get_template_directory_uri();?>/img/hero.avif" />
                    <source type="image/webp"
                        data-srcset="<?php echo get_template_directory_uri();?>/img/hero.webp" />
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        data-src="<?php echo get_template_directory_uri();?>/img/hero.png"
                        decoding="async" alt="" width="100%" height="100%" />
                </picture>
                <dl class="o-stack o-stack:planInner">
                    <dt class="c-plan-title">Aプラン
                        <span class="c-plan-title__price">¥0,000~</span>
                    </dt>
                    <dd class="c-plan-content">
                        説明文説明文説明文説明文説明文説明文説明文説明文説明文説明文
                        <a href="<?php echo home_url('/plan#planA');?>"
                            class="c-link c-link:planInner">詳しく見る</a>
                    </dd>
                </dl>
            </li>
            <li class="o-stack o-stack:planCard">
                <picture class="o-frame o-frame:switch">
                    <source type="image/avif"
                        srcset="<?php echo get_template_directory_uri();?>/img/slider-img02.avif" />
                    <source type="image/webp"
                        srcset="<?php echo get_template_directory_uri();?>/img/slider-img02.webp" />
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        data-src="<?php echo get_template_directory_uri();?>/img/slider-img02.jpg"
                        decoding="async" alt="" width="100%" height="100%" />
                </picture>
                <dl class="o-stack o-stack:planInner">
                    <dt class="c-plan-title">Bプラン
                        <span class="c-plan-title__price">¥0,000~</span>
                    </dt>
                    <dd class="c-plan-content">
                        説明文説明文説明文説明文説明文説明文説明文説明文説明文説明文
                        <a href="<?php echo home_url('/plan#planB');?>"
                            class="c-link c-link:planInner">詳しく見る</a>
                    </dd>
                </dl>
            </li>
            <li class="o-stack o-stack:planCard">
                <picture class="o-frame o-frame:switch">
                    <source type="image/avif"
                        data-srcset="<?php echo get_template_directory_uri();?>/img/slider-img03.avif" />
                    <source type="image/webp"
                        data-srcset="<?php echo get_template_directory_uri();?>/img/slider-img03.webp" />
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        data-src="<?php echo get_template_directory_uri();?>/img/slider-img03.jpg"
                        decoding="async" alt="" width="100%" height="100%" />
                </picture>
                <dl class="o-stack o-stack:planInner">
                    <dt class="c-plan-title">Cプラン
                        <span class="c-plan-title__price">¥0,000~</span>
                    </dt>
                    <dd class="c-plan-content">
                        説明文説明文説明文説明文説明文説明文説明文説明文説明文説明文
                        <a href="<?php echo home_url('/plan#planC');?>"
                            class="c-link c-link:planInner">詳しく見る</a>
                    </dd>
                </dl>
            </li>
            <li class="o-stack o-stack:planCard">
                <picture class="o-frame o-frame:switch">
                    <source type="image/avif"
                        data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.avif" />
                    <source type="image/webp"
                        data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.webp" />
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        data-src="<?php echo get_template_directory_uri();?>/img/thumb.png"
                        decoding="async" alt="" width="100%" height="100%" />
                </picture>
                <dl class="o-stack o-stack:planInner">
                    <dt class="c-plan-title">Dプラン
                        <span class="c-plan-title__price">¥0,000~</span>
                    </dt>
                    <dd class="c-plan-content">
                        説明文説明文説明文説明文説明文説明文説明文説明文説明文説明文
                        <a href="<?php echo home_url('/plan#planD');?>"
                            class="c-link c-link:planInner">詳しく見る</a>
                    </dd>
                </dl>
            </li>
        </ul>
    </div>
    <a href="<?php echo home_url('/plan');?>"
        class="c-btn c-btn:ghost">
        全プランを見る
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
            <path
                d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                fill="currentColor"></path>
        </svg>
    </a>
</div>
<div class="c-front-box c-front-box:borderBottom">
    <h2 class="c-heading c-heading:mrn">News</h2>
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
<div class="c-front-box c-front-box:border-bottom">
    <h2 class="c-heading c-heading:mrn">Review</h2>
    <div class="o-container o-container:main">
        <?php echo get_total_review();
        echo get_front_review();?>
    </div>
</div>
<div class="c-front-box">
    <h2 class="c-heading c-heading:mrn">What's New</h2>
    <div class="o-container o-container:main">
        <?php echo get_front_content();?>
    </div>
</div>
<?php get_footer();

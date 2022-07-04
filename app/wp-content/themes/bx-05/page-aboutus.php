<?php get_header();?>
<div class="o-container o-container:underPage" id="store-info">
    <div class="c-inner-wrap u-pt-l u-mb-l">
        <h2 class="c-heading c-heading:mlt">Store Info</h2>
        <dl class="c-table c-table:ghost u-mb-m">
            <dt class="c-table__title c-table__title:ghost">店名</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('store', 'name');?>
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
            <dt class="c-table__title c-table__title:ghost">電話番号</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('company', 'tel');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">所在地</dt>
            <dd class="c-table__content c-table__content:ghost">
                〒<?php echo get_vars('company', 'zip');?><br />
                <?php echo get_vars('company', 'address');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">アクセス</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('store', 'access');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">駐車場</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php
                    $parking = get_vars('store', 'parking');
                    if ($parking['flag'] === 'なし') {
                        echo $parking['flag'];
                    } else {
                        echo $parking['flag'] . "<br />";
                        echo '敷地内に' . $parking['net'] . "n台有り<br />" . $parking['detail'];
                    }
                ?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">最寄駅</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php echo get_vars('store', 'station');?>
            </dd>
            <dt class="c-table__title c-table__title:ghost">お支払い方法</dt>
            <dd class="c-table__content c-table__content:ghost">
                <?php
                    $pays = get_vars('store', 'pay');
                    if ($pays) {
                        echo '<ul class="c-list">';
                        for ($i = 0; $i < count($pays); $i++) {
                            echo '<li>' . $pays[$i] . '</li>';
                        }
                        echo '</ul>';
                    }
                ?>
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
<div class="o-container o-container:underPage">
    <div class="c-inner-wrap u-pt-l u-mb-l">
        <h2 class="c-heading c-heading:mlt">Company</h2>
        <dl class="c-table">
            <dt class="c-table__title">屋号/商号</dt>
            <dd class="c-table__content">
                <?php echo get_vars('company', 'name');?>
            </dd>
            <dt class="c-table__title">代表者</dt>
            <dd class="c-table__content">
                <?php echo get_vars('company', 'owner');?>
            </dd>
            <dt class="c-table__title">設立</dt>
            <dd class="c-table__content">
                <?php echo get_vars('company', 'birth');?>
            </dd>
            <dt class="c-table__title">所在地</dt>
            <dd class="c-table__content">
                〒<?php echo get_vars('company', 'zip');?>
                <?php echo get_vars('company', 'address');?>
            </dd>
            <dt class="c-table__title">事業内容</dt>
            <dd class="c-table__content">
                <?php echo get_service_list();?>
            </dd>
        </dl>
    </div>
</div>
<?php get_footer();

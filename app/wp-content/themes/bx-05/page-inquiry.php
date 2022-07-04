<?php get_header();?>
<div class="o-container o-container:underPage">
    <div class="c-inner-wrap u-pt-l u-mb-l">
        <p class="u-mb-m">
            サービスに関するご質問、ご要望などございましたら、下記のお問い合わせフォームから、お気軽にお寄せください。
        </p>
        <!-- do_shortcode -->
        <dl class="c-table">
            <dt class="c-table__title">お名前</dt>
            <dd class="c-table__content">
                <input class="c-input" type="text" placeholder="例）お名前" />
            </dd>
            <dt class="c-table__title c-table__title:require">メールアドレス</dt>
            <dd class="c-table__content">
                <input class="c-input" type="text" placeholder="例）info@examples.com" />
            </dd>
            <dt class="c-table__title c-table__title:require">お問い合わせ内容</dt>
            <dd class="c-table__content">
                <textarea class="c-input" placeholder="お気軽にご入力ください"></textarea>
            </dd>
        </dl>
        <label class="o-grid o-grid:accept">
            <input class="c-checkbtn" type="checkbox" />
            <a class="c-link c-link:inline"
                href="<?php echo home_url('/privacy-policy');?>"
                target="_blank" rel="noopener"> プライバシーポリシー </a>
            に同意する
        </label>
        <button class="c-btn c-btn--submit" type="submit">送信</button>
        <ul class="o-stack o-stack:announce">
            <li>調査等のため、返信にお時間を頂くことがございます。予めご了承ください。</li>
            <li>
                万が一、一週間経っても返信がない場合は大変お手数ですが、
                <a class="c-link c-link:inline"
                    href="mailto:<?php echo get_vars('company', 'mail')['primary'];?>"
                    target="_blank" rel="noopener">
                    <?php echo get_vars('company', 'mail')['primary'];?>
                </a>
                までご連絡ください。
            </li>
        </ul>
    </div>
</div>
<?php get_footer();

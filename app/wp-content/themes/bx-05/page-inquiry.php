<?php get_header();?>
<div class="o-container o-container:underPage">
    <div class="c-inner-wrap u-pt-l u-mb-l">
        <p class="u-mb-m">
            サービスに関するご質問、ご要望などございましたら、下記のお問い合わせフォームから、お気軽にお寄せください。
        </p>
        <?php echo do_shortcode('[contact-form-7 id="xx" title="xx"]');?>
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

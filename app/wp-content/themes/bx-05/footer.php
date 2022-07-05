</main>
<div class="c-bottom-float">
    <div class="c-bottom-float__inner">
        <span class="o-stack o-stack:bottomFloat">
            <a class="o-has-icon o-has-icon:floatTel"
                href="tel:<?php echo get_vars('company', 'tel');?>">
                <span class="c-bottom-telIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M320 0H64C37.49 0 16 21.49 16 48v416C16 490.5 37.49 512 64 512h256c26.51 0 48-21.49 48-48v-416C368 21.49 346.5 0 320 0zM192 464c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 464 192 464z"
                            fill="currentColor" />
                    </svg>
                </span>
                <?php echo get_vars('company', 'tel');?>
            </a>
            受付時間: 平日<?php echo get_vars('company', 'open');?>~<?php echo get_vars('company', 'close');?>
        </span>
        <a href="<?php echo home_url('/request');?>"
            class="c-btn c-btn:float">
            資料請求
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
                <path
                    d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                    fill="currentColor"></path>
            </svg>
        </a>
        <button class="c-btn-float" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"
                    fill="currentColor" />
            </svg>
        </button>
    </div>
</div>
<footer class="o-container o-container:footer">
    <ul class="o-cluster o-cluster:ftNav">
        <li class="o-cluster__ftItem"><a class="c-link c-link:ftNav"
                href="<?php echo home_url('/company');?>">COMPANY</a>
        </li>
        <li class="o-cluster__ftItem"><a class="c-link c-link:ftNav"
                href="<?php echo home_url('/terms');?>">TERMS</a>
        </li>
        <li class="o-cluster__ftItem"><a class="c-link c-link:ftNav"
                href="<?php echo home_url('/privacy-policy');?>">PRIVACY
                POLICY</a></li>
        <li class="o-cluster__ftItem"><a class="c-link c-link:ftNav"
                href="<?php echo home_url('/inquiry');?>">INQUIRY</a>
        </li>
    </ul>
    <a href="#" class="c-footer-logo"><?php echo get_vars('site', 'name');?></a>
    <div class="o-stack o-stack:bottomAddress">
        〒<?php echo get_vars('company', 'zip');?>
        <?php echo get_vars('company', 'address');?><br />
        <a class="o-has-icon o-has-icon:bottomTel"
            href="tel:<?php echo get_vars('company', 'tel');?>">
            <span class="c-menu-telIcon c-menu-telIcon:bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M320 0H64C37.49 0 16 21.49 16 48v416C16 490.5 37.49 512 64 512h256c26.51 0 48-21.49 48-48v-416C368 21.49 346.5 0 320 0zM192 464c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 464 192 464z"
                        fill="currentColor" />
                </svg>
            </span>
            <?php echo get_vars('company', 'tel');?>
        </a>
        受付時間 平日<?php echo get_vars('company', 'open');?>~<?php echo get_vars('company', 'close');?>
    </div>
    <p class="c-copyright"><?php echo get_vars('site', 'copyright');?>
    </p>
</footer>
<?php wp_footer();?>
</body>

</html>
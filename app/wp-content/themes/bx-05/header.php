<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head
    prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo get_ogp_type();?>: http://ogp.me/ns/<?php echo get_ogp_type();?>#">
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.defer = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?php echo get_vars('site', 'gtm');?>'
        );
    </script>
    <!-- End Google Tag Manager -->
    <meta
        charset="<?php bloginfo('charset');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=<?php echo get_vars('site', 'gtm');?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="o-container o-container:header">
        <a href="<?php echo home_url();?>" class="c-logo"><?php echo get_vars('site', 'name');?></a>
        <form class="c-header-end" method="get"
            action="<?php echo home_url();?>" role="search">
            <input class="c-search" name="s" type="text" placeholder="キーワードを入力">
            <label class="c-search-icon" for="s">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"
                        fill="currentColor" />
                </svg>
            </label>
        </form>
    </header>
    <button type="button" class="c-menu-btn" aria-label="menu open" aria-controls="sidebar" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path
                d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"
                fill="currentColor" />
        </svg>
    </button>
    <div class="c-menu" id="menu" aria-hidden="true">
        <header class="c-menu__header">
            <a href="<?php echo home_url();?>" class="c-menu__logo">
                <svg width="32" height="21" viewBox="0 0 32 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.9986 13.7163L24.0002 20.5753L19.9992 13.7163H27.9986Z" fill="#6BA4CC" />
                    <path d="M15.9998 20.5753L19.9997 13.7158L23.9996 20.5753H15.9998Z" fill="#70A9CF" />
                    <path d="M19.9987 13.7163L15.9998 20.5753L11.9998 13.7163H19.9987Z" fill="#8DC6DF" />
                    <path d="M7.99988 20.5753L11.9998 13.7158L15.9997 20.5753H7.99988Z" fill="#8FC5DE" />
                    <path d="M0 20.5753L3.99994 13.7163L7.99987 20.5758L0 20.5753Z" fill="#7EAFD2" />
                    <path d="M32 6.85895L28.0001 13.7163L23.9996 6.85895H32Z" fill="#83C1DB" />
                    <path d="M19.9997 13.7163L23.9991 6.85895L27.9985 13.7163H19.9997Z" fill="#7BB6D6" />
                    <path d="M23.9996 6.85895L19.9997 13.7163L15.9998 6.85895H23.9996Z" fill="#76ACD1" />
                    <path d="M11.9998 13.7163L15.9998 6.85895L19.9987 13.7163H11.9998Z" fill="#84BBD9" />
                    <path d="M15.9997 6.85895L11.9998 13.7163L7.99988 6.85895H15.9997Z" fill="#72A7CE" />
                    <path d="M3.99994 13.7163L7.99987 6.85895L11.9988 13.7163H3.99994Z" fill="#6393C4" />
                    <path d="M23.9996 6.85894L27.9991 0L31.9995 6.85946L23.9996 6.85894Z" fill="#94D0E4" />
                    <path d="M15.9998 6.85894L19.9997 0L23.9996 6.85946L15.9998 6.85894Z" fill="#81B7D6" />
                    <path d="M7.99988 6.85894L11.9998 0L15.9997 6.85946L7.99988 6.85894Z" fill="#72A7CE" />
                    <path d="M11.9988 0L7.99987 6.85894L3.99994 0H11.9988Z" fill="#689CC8" />
                </svg>
            </a>
            <button class="c-close-btn" aria-label="menu close" aria-controls="sidebar" aria-expanded="false">
                <span class="c-close-btn__label">CLOSE</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"
                        fill="currentColor" />
                </svg>
            </button>
        </header>
        <div class="c-menu__body">
            <nav class="o-stack o-stack:menu u-mb-l">
                <a href="<?php echo home_url();?>"
                    class="c-link c-link:menu">HOME</a>
                <a href="<?php echo home_url('/company');?>"
                    class="c-link c-link:menu">COMPANY</a>
                <a href="<?php echo home_url('/plan');?>"
                    class="c-link c-link:menu">PLAN</a>
                <a href="<?php echo home_url('/gallery');?>"
                    class="c-link c-link:menu">GALLERY</a>
                <a href="<?php echo home_url('/review');?>"
                    class="c-link c-link:menu">REVIEW</a>
                <a href="<?php echo home_url('/inquiry');?>"
                    class="c-link c-link:menu">INQUIRY</a>
            </nav>
            <a href="<?php echo home_url();?>"
                class="c-menu-logo"><?php echo get_vars('site', 'name');?></a>
            <div class="c-menu__address">
                〒<?php echo get_vars('company', 'zip');?>
                <?php echo get_vars('company', 'address');?><br />
                <a class="o-has-icon o-has-icon:menuTel"
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
                受付時間 平日<?php echo get_vars('company', 'open');?>~<?php echo get_vars('company', 'close');?>
            </div>
            <div class="o-cluster o-cluster:menuSns">
                <a href="<?php echo get_vars('sns', 'fb');?>"
                    class="c-link c-link:menuSns" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="<?php echo get_vars('sns', 'tw');?>"
                    class="c-link c-link:menuSns" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="<?php echo get_vars('sns', 'instagram');?>"
                    class="c-link c-link:menuSns" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                            fill="currentColor" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <main>
        <?php if (is_front_page()):?>
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <picture class="o-frame o-frame:switch">
                        <source type="image/avif"
                            srcset="<?php echo get_template_directory_uri();?>/img/hero.avif" />
                        <source type="image/webp"
                            srcset="<?php echo get_template_directory_uri();?>/img/hero.webp" />
                        <img src="<?php echo get_template_directory_uri();?>/img/hero.png"
                            loading="lazy" decoding="async" alt="" width="100%" height="100%" />
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture class="o-frame o-frame:switch">
                        <source type="image/avif"
                            srcset="<?php echo get_template_directory_uri();?>/img/slider-img02.avif" />
                        <source type="image/webp"
                            srcset="<?php echo get_template_directory_uri();?>/img/slider-img02.webp" />
                        <img src="<?php echo get_template_directory_uri();?>/img/slider-img02.jpg"
                            loading="lazy" decoding="async" alt="" width="100%" height="100%" />
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture class="o-frame o-frame:switch">
                        <source type="image/avif"
                            srcset="<?php echo get_template_directory_uri();?>/img/slider-img03.avif" />
                        <source type="image/webp"
                            srcset="<?php echo get_template_directory_uri();?>/img/slider-img03.webp" />
                        <img src="<?php echo get_template_directory_uri();?>/img/slider-img03.jpg"
                            loading="lazy" decoding="async" alt="" width="100%" height="100%" />
                    </picture>
                </div>
            </div>
            <h1 class="o-cover o-cover:sliderOver">
                <span class="c-slider-copy__icon">
                    <svg width="40" height="26" viewBox="0 0 40 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M34.8751 17.026H25.3882L30.1332 25.1604L34.8751 17.026ZM33.5541 17.785H26.7096L30.133 23.6537L33.5541 17.785Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M20.2654 25.1604H29.7529L25.0091 17.0254L20.2654 25.1604ZM21.5866 24.4014H28.4317L25.0091 18.5321L21.5866 24.4014Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M24.6281 17.026H15.1418L19.8856 25.1604L24.6281 17.026ZM23.307 17.785H16.4631L19.8855 23.6536L23.307 17.785Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.019 25.1604H19.5066L14.7628 17.0254L10.019 25.1604ZM11.3403 24.4014H18.1853L14.7628 18.5321L11.3403 24.4014Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 25.1604L9.48751 25.161L4.74376 17.026L0 25.1604ZM1.32123 24.4015L8.16623 24.4019L4.74373 18.5327L1.32123 24.4015Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M40.0001 8.51379H30.512L35.2563 16.6464L40.0001 8.51379ZM38.6787 9.27281H31.8335L35.2563 15.14L38.6787 9.27281Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M25.3887 16.6464H34.875L30.1318 8.51379L25.3887 16.6464ZM26.71 15.8874H33.5536L30.1318 10.0204L26.71 15.8874Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M29.7529 8.51379H20.2654L25.0091 16.6464L29.7529 8.51379ZM28.4315 9.27281H21.5868L25.0091 15.14L28.4315 9.27281Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.1418 16.6464H24.6281L19.8856 8.51379L15.1418 16.6464ZM16.4633 15.8874H23.3069L19.8855 10.0204L16.4633 15.8874Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.5066 8.51379H10.019L14.7628 16.6464L19.5066 8.51379ZM18.1851 9.27281H11.3405L14.7628 15.14L18.1851 9.27281Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.896 16.6464H14.3823L9.63975 8.51379L4.896 16.6464ZM6.21743 15.8874H13.061L9.63967 10.0204L6.21743 15.8874Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M30.512 8.13442L39.9995 8.13503L35.2551 0L30.512 8.13442ZM31.8331 7.3755L38.6781 7.37594L35.2552 1.50672L31.8331 7.3755Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M20.2654 8.13442L29.7529 8.13503L25.0091 0L20.2654 8.13442ZM21.5866 7.3755L28.4316 7.37594L25.0091 1.50672L21.5866 7.3755Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.019 8.13442L19.5066 8.13503L14.7628 0L10.019 8.13442ZM11.3403 7.3755L18.1853 7.37594L14.7628 1.50672L11.3403 7.3755Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.3823 0H4.896L9.63975 8.13442L14.3823 0ZM13.0612 0.759011H6.21728L9.63967 6.62761L13.0612 0.759011Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
                <span class="c-slider-copy__logo"><?php echo get_vars('site', 'name');?></span>
            </h1>
        </div>
        <?php else :?>
        <?php echo get_page_title();
        echo get_breadcrumb();?>
        <?php endif;

<?php

add_theme_support('post-thumbnails');
add_action('init', 'remove_block_editor_options');
function remove_block_editor_options()
{
    remove_post_type_support('post', 'excerpt');  // 抜粋
    remove_post_type_support('post', 'trackbacks');// トラックバック
    remove_post_type_support('post', 'author');// 作成者
    remove_post_type_support('post', 'comments');// コメント
    remove_post_type_support('post', 'page-attributes'); // 表示順
    remove_post_type_support('post', 'post-formats');// 投稿フォーマット
    remove_post_type_support('page', 'page-attributes');
    remove_post_type_support('page', 'excerpt');  // 抜粋
    remove_post_type_support('page', 'trackbacks');// トラックバック
    remove_post_type_support('page', 'author');// 作成者
    remove_post_type_support('page', 'comments');// コメント
    remove_post_type_support('page', 'page-attributes'); // 表示順
}
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type(
        'news',
        array(
        'labels' => array(
            'name' => 'お知らせ',
            'singular_name' => 'お知らせ',
            'add_new_item' => 'お知らせの新規追加',
            'edit_item' => 'お知らせの編集'
        ),
        'hierarchical' => false,
        'public' => true,
        'menu_position' =>10,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-clipboard',
        'rewrite' => array('with_front' => false),
        'supports' => array('title','editor')
        )
    );
    register_post_type(
        'gallery',
        array(
        'labels' => array(
            'name' => 'ギャラリー',
            'singular_name' => 'ギャラリー',
            'add_new_item' => 'ギャラリーの新規追加',
            'edit_item' => 'ギャラリーの編集'
        ),
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 14,
        'supports' => array('title','thumbnail'),
        'menu_icon'   => 'dashicons-format-gallery',
        )
    );
    register_post_type(
        'review', /* post-type */
        array(
        'labels' => array(
            'name' => '口コミ',
            'singular_name' => '口コミ',
            'add_new_item' => '口コミの新規追加',
            'edit_item' => '口コミの編集'
        ),
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 16,
        'supports' => array('editor','title','thumbnail'),
        'menu_icon'   => 'dashicons-star-half',
        )
    );
    register_post_type(
        'product', /* post-type */
        array(
        'labels' => array(
            'name' => '商品',
            'singular_name' => '商品',
            'add_new_item' => '商品の新規追加',
            'edit_item' => '商品の編集'
        ),
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 15,
        'supports' => array('editor','title','thumbnail'),
        'menu_icon'   => 'dashicons-cart',
        )
    );
    register_post_type(
        'campaign', /* post-type */
        array(
        'labels' => array(
            'name' => 'キャンペーン',
            'singular_name' => 'キャンペーン',
            'add_new_item' => 'キャンペーンの新規追加',
            'edit_item' => 'キャンペーンの編集'
        ),
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 17,
        'supports' => array('editor','title','thumbnail'),
        'menu_icon'   => 'dashicons-tickets',
        )
    );
}
function my_redirect_404()
{
    if (is_singular('gallery') || is_singular('review')) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}
add_action('template_redirect', 'my_redirect_404');
function custom_post_type_link($link, $post)
{
    if ($post->post_type === 'news') {
        return home_url('/news/' . $post->ID);
    } elseif ($post->post_type === 'product') {
        return home_url('/product/' . $post->ID);
    } elseif ($post->post_type === 'campaign') {
        return home_url('/campaign/' . $post->ID);
    } else {
        return $link;
    }
}
add_filter('post_type_link', 'custom_post_type_link', 1, 2);
function news_rewrite_rules_array($rules)
{
    $new_rewrite_rules = array(
      'news/([0-9]+)/?$' => 'index.php?post_type=news&p=$matches[1]',
    );
    return $new_rewrite_rules + $rules;
}
add_filter('rewrite_rules_array', 'news_rewrite_rules_array');
function product_rewrite_rules_array($rules)
{
    $product_rewrite_rules = array(
      'product/([0-9]+)/?$' => 'index.php?post_type=product&p=$matches[1]',
    );
    return $product_rewrite_rules + $rules;
}
add_filter('rewrite_rules_array', 'product_rewrite_rules_array');
function campaign_rewrite_rules_array($rules)
{
    $campaign_rewrite_rules = array(
      'campaign/([0-9]+)/?$' => 'index.php?post_type=campaign&p=$matches[1]',
    );
    return $campaign_rewrite_rules + $rules;
}
add_filter('rewrite_rules_array', 'campaign_rewrite_rules_array');
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = esc_attr('blog');
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

function change_post_menu_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = esc_attr('記事');
    $submenu['edit.php'][5][0] = esc_attr('記事一覧');
    $submenu['edit.php'][10][0] = '新しい' . esc_attr('記事');
    $submenu['edit.php'][16][0] = 'タグ';
}

function change_post_object_label()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = esc_attr('記事');
    $labels->singular_name = esc_attr('記事');
    $labels->add_new = _x('追加', esc_attr('記事'));
    $labels->add_new_item = esc_attr('記事') . 'の新規追加';
    $labels->edit_item = esc_attr('記事') . 'の編集';
    $labels->new_item = '新規' . esc_attr('記事');
    $labels->view_item = esc_attr('記事') . 'を表示';
    $labels->search_items = esc_attr('記事') . 'を検索';
    $labels->not_found = '記事が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');

function add_my_box()
{
    $addtype = array( 'post', 'page', 'news', 'product', 'campaign' );
    add_meta_box('meta_info', 'SEO', 'meta_info_form', $addtype, 'side');
    add_meta_box('meta_review', '口コミ情報', 'meta_review_form', 'review', 'normal');
    add_meta_box('meta_product', '商品情報', 'meta_product_form', 'product', 'normal');
    add_meta_box('meta_campaign', 'キャンペーン情報', 'meta_campaign_form', 'campaign', 'normal');
}
add_action('admin_menu', 'add_my_box');

function meta_info_form()
{
    global $post;
    $keywords = get_post_meta($post->ID, 'meta_keywords', true);
    $description = get_post_meta($post->ID, 'meta_description', true); ?>
<h3 style="font-size: 14px; margin: 0 0 8px;">キーワード</h3>
<input type="text" name="meta_keywords"
    value="<?php echo esc_html($keywords); ?>"
    style="width: 100%;margin: 0 0 8px;" />
<p style="color:#666; font-size: 13px; line-height: 1.68; margin: 0">キーワードが複数ある場合はコンマで区切ってください</p>
<h3 style="font-size: 14px; margin: 8px 0;padding: 8px 0 0;border-top:1px solid #ccd0d4;">ディスクリプション（抜粋兼用） <span
        style="color:#666; font-size: 13px">※200文字以上は省略されます。</span></h3>
<textarea id="meta_description" name="meta_description" rows="1" cols="40"
    style="width: 100%; height: 60px"><?php echo htmlspecialchars($description); ?></textarea>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var maxcount = 200;
        $('#meta_description').after(
            '<p style=\"color:#666; font-size: 13px; margin: 0\">文字数: <span id=\"description-count\"></span></p>'
        );
        $('#description-count').text($('#meta_description').val().replace(/\s+/g, '').length);
        if ($('#meta_description').val().replace(/\s+/g, '').length > maxcount) {
            $('#description-count').css('color', '#f00');
        } else {
            $('#description-count').css('color', '#666');
        }
        $('#meta_description').bind("keydown keyup keypress change", function() {
            $('#description-count').text($('#meta_description').val().replace(/\s+/g, '').length);
            if ($(this).val().replace(/\s+/g, '').length > maxcount) {
                $('#description-count').css('color', '#f00');
            } else {
                $('#description-count').css('color', '#666');
            }
        });
        $('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before(
            '<p style="font-size: 14px; margin: 0 0 8px;">※ 複数選んでも、表示は1つです。</p>');
    });
</script>
<?php
}

function meta_review_form()
{
    global $post;
    $review_rate = get_post_meta($post->ID, 'review_rate', true); ?>
<h3 style="font-size: 14px; margin: 0 0 8px;">レビュー（1〜5で入力してください）</h3>
<input type="text" name="review_rate"
    value="<?php echo esc_html($review_rate); ?>"
    style="width: 100%;margin: 0 0 8px;" />
<?php
}

function meta_product_form()
{
    global $post;
    $product_price = get_post_meta($post->ID, 'product_price', true); ?>
<h3 style="font-size: 14px; margin: 0 0 8px;">価格（税込価格を数値で入力してください）</h3>
<input type="text" name="product_price"
    value="<?php echo esc_html($product_price); ?>"
    style="width: 100%;margin: 0 0 8px;" />
<?php
}

function meta_campaign_form()
{
    global $post;
    $campaign_start = get_post_meta($post->ID, 'campaign_start', true);
    $campaign_end = get_post_meta($post->ID, 'campaign_end', true); ?>
<h3 style="font-size: 14px; margin: 0 0 8px;">開始日（YYYY-mm-dd形式で入力してください）</h3>
<input type="text" name="campaign_start"
    value="<?php echo esc_html($campaign_start); ?>"
    style="width: 100%;margin: 0 0 8px;" />
<h3 style="font-size: 14px; margin: 0 0 8px;">終了日（YYYY-mm-dd形式で入力してください）</h3>
<input type="text" name="campaign_end"
    value="<?php echo esc_html($campaign_end); ?>"
    style="width: 100%;margin: 0 0 8px;" />
<?php
}

function save_meta_info($post_id)
{
    if (isset($_POST['meta_keywords'])) {
        update_post_meta($post_id, 'meta_keywords', $_POST['meta_keywords']);
    } else {
        delete_post_meta($post_id, 'meta_keywords');
    }
    if (isset($_POST['meta_description'])) {
        update_post_meta($post_id, 'meta_description', $_POST['meta_description']);
    } else {
        delete_post_meta($post_id, 'meta_description');
    }
    if (isset($_POST['review_rate'])) {
        update_post_meta($post_id, 'review_rate', $_POST['review_rate']);
    } else {
        delete_post_meta($post_id, 'review_rate');
    }
    if (isset($_POST['product_price'])) {
        update_post_meta($post_id, 'product_price', $_POST['product_price']);
    } else {
        delete_post_meta($post_id, 'product_price');
    }
    if (isset($_POST['campaign_start'])) {
        update_post_meta($post_id, 'campaign_start', $_POST['campaign_start']);
    } else {
        delete_post_meta($post_id, 'campaign_start');
    }
    if (isset($_POST['campaign_end'])) {
        update_post_meta($post_id, 'campaign_end', $_POST['campaign_end']);
    } else {
        delete_post_meta($post_id, 'campaign_end');
    }
}
add_action('save_post', 'save_meta_info');

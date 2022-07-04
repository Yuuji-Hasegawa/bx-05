<?php get_header();?>
<div class="o-container o-container:underPage">
    <div class="c-inner-wrap u-pt-l u-mb-l">
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

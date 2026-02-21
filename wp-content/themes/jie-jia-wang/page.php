<?php
/**
 * 页面模板
 */
get_header();
?>

<!-- 页面标题 -->
<?php if (!is_front_page()) : ?>
<div class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="breadcrumb">
            <a href="<?php echo home_url(); ?>">首页</a> &raquo; <?php the_title(); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- 页面内容 -->
<section class="section">
    <div class="container">
        <div class="entry-content">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

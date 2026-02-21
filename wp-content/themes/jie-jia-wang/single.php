<?php
/**
 * 文章详情模板
 */
get_header();
?>

<div class="section">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class('entry-content'); ?>>
            <?php
            while (have_posts()) : the_post();
                ?>
                <header class="mb-4">
                    <h1><?php the_title(); ?></h1>
                    <div class="text-muted" style="font-size: 0.9rem;">
                        <span>发布时间：<?php echo get_the_date(); ?></span>
                        <?php if (get_the_category()) : ?>
                            <span style="margin-left: 20px;">分类：<?php the_category(', '); ?></span>
                        <?php endif; ?>
                    </div>
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-4">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                
                <?php
                if (get_the_tags()) {
                    echo '<div class="mt-4" style="border-top: 1px solid var(--border-light); padding-top: 16px;">';
                    echo '<strong>标签：</strong>';
                    the_tags('', ', ');
                    echo '</div>';
                }
                ?>
                
                <?php
            endwhile;
            ?>
        </article>
        
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>

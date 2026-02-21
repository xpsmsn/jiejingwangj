<?php
/**
 * 文章详情模板
 */
get_header();
?>

<div class="section">
    <div class="container container-narrow">
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
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                
                <?php
                // 文章标签
                if (get_the_tags()) {
                    echo '<div class="mt-4 pt-4" style="border-top: 1px solid var(--border-color);">';
                    echo '<strong>标签：</strong>';
                    the_tags('', ', ');
                    echo '</div>';
                }
                ?>
                
                <?php
            endwhile;
            ?>
        </article>
        
        <!-- 相关文章 -->
        <div class="mt-5">
            <h3 class="mb-3">相关文章</h3>
            <div class="grid grid-2">
                <?php
                $related_posts = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'post__not_in' => array(get_the_ID()),
                ));
                
                foreach ($related_posts as $post) :
                    setup_postdata($post);
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="text-muted" style="font-size: 0.9rem;"><?php echo get_the_date(); ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        
        <!-- 评论 -->
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>

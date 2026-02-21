<?php
/**
 * 默认模板
 */
get_header();
?>

<div class="section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="grid grid-2">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="card-text">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline mt-3">阅读全文</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php jiejiawang_pagination(); ?>
            
        <?php else : ?>
            <div class="text-center">
                <h2>暂无内容</h2>
                <p>抱歉，没有找到相关内容。</p>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary">返回首页</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>

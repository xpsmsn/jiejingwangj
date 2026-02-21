<?php
/**
 * 搜索结果模板
 */
get_header();
?>

<!-- 页面标题 -->
<div class="page-header">
    <div class="container">
        <h1>搜索结果</h1>
        <div class="breadcrumb">
            <a href="<?php echo home_url(); ?>">首页</a> &raquo; 搜索结果：<?php echo get_search_query(); ?>
        </div>
    </div>
</div>

<!-- 搜索结果内容 -->
<section class="section section-white">
    <div class="container">
        <p class="mb-4">找到 <?php echo $wp_query->found_posts; ?> 个与"<?php echo get_search_query(); ?>"相关的结果</p>
        
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
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline mt-3">查看详情</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php jiejiawang_pagination(); ?>
            
        <?php else : ?>
            <div class="text-center" style="padding: 60px 0;">
                <h2>未找到相关内容</h2>
                <p>抱歉，没有找到您搜索的内容。请尝试其他关键词。</p>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary mt-3">返回首页</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

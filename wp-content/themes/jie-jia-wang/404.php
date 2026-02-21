<?php
/**
 * 404 错误页面模板
 */
get_header();
?>

<!-- 页面标题 -->
<div class="page-header">
    <div class="container">
        <h1>页面未找到</h1>
    </div>
</div>

<!-- 404内容 -->
<section class="section section-white">
    <div class="container text-center">
        <div style="font-size: 8rem; line-height: 1; margin-bottom: 20px;">404</div>
        <h2 class="mb-3">抱歉，您访问的页面不存在</h2>
        <p class="text-light mb-4">您访问的页面可能已被删除、名称已更改或暂时不可用。</p>
        
        <div class="mb-5">
            <h4 class="mb-3">您可以：</h4>
            <ul style="list-style: none; padding: 0;">
                <li class="mb-2">✓ <a href="<?php echo home_url(); ?>">返回首页</a></li>
                <li class="mb-2">✓ <a href="<?php echo home_url('/services'); ?>">浏览我们的服务</a></li>
                <li class="mb-2">✓ <a href="<?php echo home_url('/contact'); ?>">联系我们</a></li>
            </ul>
        </div>
        
        <a href="<?php echo home_url(); ?>" class="btn btn-primary">返回首页</a>
    </div>
</section>

<?php get_footer(); ?>

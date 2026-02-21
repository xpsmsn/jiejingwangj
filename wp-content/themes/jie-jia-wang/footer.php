<?php
/**
 * 底部模板 - 移动端优先设计
 */
$company_name = get_theme_mod('company_name', '武汉洁净旺家家政服务部');
$company_address = get_theme_mod('company_address', '湖北省武汉市洪山区珞喻路446号-附1号');
$company_phone = get_theme_mod('company_phone', '15392956537');
$company_phone2 = get_theme_mod('company_phone2', '15392966758');
$company_contact = get_theme_mod('company_contact', '章阿姨');
$business_hours = get_theme_mod('business_hours', '周一至周日 8:00-20:00');
$wechat_qrcode = get_theme_mod('wechat_qrcode', '');
?>

<!-- 页脚 -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-main">
            <!-- 品牌与联系方式 -->
            <div class="footer-brand-section">
                <h3 class="footer-logo"><?php bloginfo('name'); ?></h3>
                <p class="footer-desc"><?php echo esc_html(get_theme_mod('company_desc', '武汉洪山区专业家政服务品牌，十年深耕，用心服务每一个家庭。')); ?></p>
                
                <div class="footer-contact-info">
                    <div class="footer-contact-item">
                        <span class="footer-contact-icon">📞</span>
                        <span><?php echo esc_html($company_phone); ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <span class="footer-contact-icon">📍</span>
                        <span><?php echo esc_html($company_address); ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <span class="footer-contact-icon">🕐</span>
                        <span><?php echo esc_html($business_hours); ?></span>
                    </div>
                </div>
            </div>
            
            <!-- 快速链接 -->
            <div class="footer-links-section">
                <h4 class="footer-title">快速导航</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">🏠 首页</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#services')); ?>">📋 服务项目</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#about')); ?>">👤 关于我们</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#contact')); ?>">📞 联系我们</a></li>
                </ul>
            </div>
            
            <!-- 二维码区域 -->
            <div class="footer-qrcode-section">
                <h4 class="footer-title">扫码咨询</h4>
                <div class="footer-qrcode-wrapper">
                    <?php if ($wechat_qrcode) : ?>
                        <img src="<?php echo esc_url($wechat_qrcode); ?>" alt="微信二维码" class="footer-qrcode">
                    <?php else : ?>
                        <div class="footer-qrcode-placeholder">
                            <span>📱</span>
                            <p>微信二维码</p>
                        </div>
                    <?php endif; ?>
                    <p class="footer-qrcode-tip">扫码添加微信咨询</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html($company_name); ?> · 联系人：<?php echo esc_html($company_contact); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

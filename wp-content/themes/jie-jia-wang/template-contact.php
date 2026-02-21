<?php
/**
 * 联系页面模板
 */
get_header();

$company_name = get_theme_mod('company_name', '武汉洁净旺家家政服务部');
$company_phone = get_theme_mod('company_phone', '15392956537');
$company_phone2 = get_theme_mod('company_phone2', '15392966758');
$company_address = get_theme_mod('company_address', '湖北省武汉市洪山区珞喻路446号-附1号');
$business_hours = get_theme_mod('business_hours', '周一至周日 8:00-20:00');
?>

<!-- 页面标题 -->
<div class="page-header">
    <div class="container">
        <h1>联系我们</h1>
        <?php jiejiawang_breadcrumb(); ?>
    </div>
</div>

<!-- 联系区域 -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Contact Us</span>
            <h2 class="section-title">联系方式</h2>
        </div>
        
        <div class="contact-card">
            <h3>联系方式</h3>
            
            <div class="contact-item">
                <div class="contact-item-icon">📞</div>
                <div class="contact-item-content">
                    <h5>联系电话</h5>
                    <p><a href="tel:<?php echo esc_attr($company_phone); ?>"><?php echo esc_html($company_phone); ?></a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-item-icon">📞</div>
                <div class="contact-item-content">
                    <h5>备用电话</h5>
                    <p><a href="tel:<?php echo esc_attr($company_phone2); ?>"><?php echo esc_html($company_phone2); ?></a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-item-icon">📍</div>
                <div class="contact-item-content">
                    <h5>公司地址</h5>
                    <p><?php echo esc_html($company_address); ?></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-item-icon">🕐</div>
                <div class="contact-item-content">
                    <h5>营业时间</h5>
                    <p><?php echo esc_html($business_hours); ?></p>
                </div>
            </div>
        </div>
        
        <div class="quick-contact">
            <a href="tel:<?php echo esc_attr($company_phone); ?>" class="btn btn-accent">📞 电话咨询</a>
            <a href="tel:<?php echo esc_attr($company_phone2); ?>" class="btn btn-phone">📞 备用电话</a>
        </div>
    </div>
</section>

<!-- 服务区域 -->
<section class="section section-cream">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Service Area</span>
            <h2 class="section-title">服务区域</h2>
            <p class="section-desc">我们为武汉市以下区域提供服务</p>
        </div>
        
        <div class="service-areas">
            <div class="area-tag">江岸区</div>
            <div class="area-tag">江汉区</div>
            <div class="area-tag">硚口区</div>
            <div class="area-tag">汉阳区</div>
            <div class="area-tag">武昌区</div>
            <div class="area-tag">洪山区</div>
            <div class="area-tag">青山区</div>
            <div class="area-tag">蔡甸区</div>
            <div class="area-tag">江夏区</div>
            <div class="area-tag">黄陂区</div>
            <div class="area-tag">新洲区</div>
            <div class="area-tag">东西湖区</div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

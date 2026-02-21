<?php
/**
 * 关于我们页面模板 - 移动端优先设计
 */
get_header();

$company_phone = get_theme_mod('company_phone', '15392956537');
$company_phone2 = get_theme_mod('company_phone2', '15392966758');
$company_address = get_theme_mod('company_address', '湖北省武汉市洪山区珞喻路446号-附1号');
$company_contact = get_theme_mod('company_contact', '章阿姨');
$company_years = get_theme_mod('company_years', '10');
$company_families = get_theme_mod('company_families', '3000');
$company_satisfaction = get_theme_mod('company_satisfaction', '98');

$about_title = get_theme_mod('about_title', '一个有温度的家政品牌');
$about_text1 = get_theme_mod('about_text1', '武汉洁净旺家家政服务部，位于洪山区珞喻路，由章阿姨创办。我们相信，一个温馨的家，需要用心的呵护。');
$about_text2 = get_theme_mod('about_text2', '十年来，我们始终坚持"用心服务、真诚待人"的理念，把每一位客户的家当作自己的家来打理。我们不只是服务者，更是您生活中的好帮手。');
$about_quote = get_theme_mod('about_quote', '把每一个家都当作自己的家来打理，让服务成为一种温暖。');
?>

<!-- 页面标题 -->
<div class="page-header">
    <div class="container">
        <h1>关于我们</h1>
        <?php jiejiawang_breadcrumb(); ?>
    </div>
</div>

<!-- 品牌故事 -->
<section class="section">
    <div class="container">
        <div class="about-section">
            <div class="about-image">
                👩
                <span><?php echo esc_html($company_contact); ?></span>
            </div>
            
            <div class="about-content">
                <span class="section-label">About Us</span>
                <h2 class="about-title"><?php echo esc_html($about_title); ?></h2>
                <p class="about-text"><?php echo esc_html($about_text1); ?></p>
                <p class="about-text"><?php echo esc_html($about_text2); ?></p>
                
                <div class="about-quote"><?php echo esc_html($about_quote); ?></div>
                
                <div class="founder-card">
                    <div class="founder-avatar"><?php echo mb_substr($company_contact, 0, 1); ?></div>
                    <div class="founder-info">
                        <h4>创始人 · <?php echo esc_html($company_contact); ?></h4>
                        <p><?php echo esc_html($company_years); ?>年家政行业经验，服务超过<?php echo esc_html($company_families); ?>个家庭</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 数据统计 -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html($company_years); ?><span>+</span></div>
                <div class="stat-label">年服务经验</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html($company_families); ?><span>+</span></div>
                <div class="stat-label">服务家庭</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html($company_satisfaction); ?><span>%</span></div>
                <div class="stat-label">客户满意度</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24<span>h</span></div>
                <div class="stat-label">快速响应</div>
            </div>
        </div>
    </div>
</section>

<!-- 企业文化 -->
<section class="section section-cream">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Values</span>
            <h2 class="section-title">企业文化</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h4 class="feature-title">使命</h4>
                <p class="feature-desc">让每一个家庭都能享受温暖的家政服务</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">👁️</div>
                <h4 class="feature-title">愿景</h4>
                <p class="feature-desc">成为武汉最值得信赖的家政品牌</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">💎</div>
                <h4 class="feature-title">价值观</h4>
                <p class="feature-desc">诚信、专业、用心、服务</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h4 class="feature-title">承诺</h4>
                <p class="feature-desc">不满意可更换，让您放心</p>
            </div>
        </div>
    </div>
</section>

<!-- 联系CTA -->
<section class="section contact-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Contact</span>
            <h2 class="section-title">联系我们</h2>
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
        </div>
        
        <div class="quick-contact">
            <a href="tel:<?php echo esc_attr($company_phone); ?>" class="btn btn-accent">📞 电话咨询</a>
            <a href="tel:<?php echo esc_attr($company_phone2); ?>" class="btn btn-phone">📞 备用电话</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>

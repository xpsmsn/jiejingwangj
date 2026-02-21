<?php
/**
 * 首页模板 - 支持WordPress后台编辑
 */
get_header();

$company_phone = get_theme_mod('company_phone', '15392956537');
$company_phone2 = get_theme_mod('company_phone2', '15392966758');
$company_contact = get_theme_mod('company_contact', '章阿姨');
$company_years = get_theme_mod('company_years', '10');
$company_families = get_theme_mod('company_families', '3000');
$company_satisfaction = get_theme_mod('company_satisfaction', '98');
$business_hours = get_theme_mod('business_hours', '周一至周日 8:00-20:00');
$company_address = get_theme_mod('company_address', '湖北省武汉市洪山区珞喻路446号-附1号');

$hero_title = get_theme_mod('hero_title', '用心服务');
$hero_subtitle = get_theme_mod('hero_subtitle', '温暖每一个家');
$hero_badge = get_theme_mod('hero_badge', '武汉洪山区 · 专业家政服务');
$hero_desc = get_theme_mod('hero_desc', '洁净旺家家政，专注月嫂、照顾老人、钟点工、住家阿姨、日常保洁等服务。十年深耕武汉，用心服务每一个家庭。');
$hero_background = get_theme_mod('hero_background', '');

$about_title = get_theme_mod('about_title', '一个有温度的家政品牌');
$about_text1 = get_theme_mod('about_text1', '武汉洁净旺家家政服务部，位于洪山区珞喻路，由章阿姨创办。我们相信，一个温馨的家，需要用心的呵护。');
$about_text2 = get_theme_mod('about_text2', '十年来，我们始终坚持"用心服务、真诚待人"的理念，把每一位客户的家当作自己的家来打理。我们不只是服务者，更是您生活中的好帮手。');
$about_quote = get_theme_mod('about_quote', '把每一个家都当作自己的家来打理，让服务成为一种温暖。');
$about_image = get_theme_mod('about_image', '');

$feature1_icon = get_theme_mod('feature1_icon', '👩‍🏫');
$feature1_title = get_theme_mod('feature1_title', '专业培训');
$feature1_desc = get_theme_mod('feature1_desc', '持证上岗，技能娴熟');
$feature2_icon = get_theme_mod('feature2_icon', '🛡️');
$feature2_title = get_theme_mod('feature2_title', '安全保障');
$feature2_desc = get_theme_mod('feature2_desc', '实名认证，背景调查');
$feature3_icon = get_theme_mod('feature3_icon', '⭐');
$feature3_title = get_theme_mod('feature3_title', '品质保证');
$feature3_desc = get_theme_mod('feature3_desc', '不满意可更换');
$feature4_icon = get_theme_mod('feature4_icon', '💰');
$feature4_title = get_theme_mod('feature4_title', '透明定价');
$feature4_desc = get_theme_mod('feature4_desc', '明码标价，无隐形消费');

$hero_style = $hero_background ? 'style="background-image: url(' . esc_url($hero_background) . ');"' : '';
?>

<!-- 英雄区域 -->
<section class="hero-section" <?php echo $hero_style; ?>>
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge"><?php echo esc_html($hero_badge); ?></span>
            <h1 class="hero-title">
                <?php echo esc_html($hero_title); ?>
                <span><?php echo esc_html($hero_subtitle); ?></span>
            </h1>
            <p class="hero-description"><?php echo esc_html($hero_desc); ?></p>
            <div class="hero-actions">
                <a href="tel:<?php echo esc_attr($company_phone); ?>" class="btn btn-primary">📞 立即电话咨询</a>
                <a href="#services" class="btn btn-secondary">了解服务项目</a>
            </div>
            
            <div class="hero-features">
                <div class="hero-feature">
                    <div class="hero-feature-icon">👩‍🍼</div>
                    <h4>专业月嫂</h4>
                    <p>持证上岗</p>
                </div>
                <div class="hero-feature">
                    <div class="hero-feature-icon">👵</div>
                    <h4>照顾老人</h4>
                    <p>贴心陪护</p>
                </div>
                <div class="hero-feature">
                    <div class="hero-feature-icon">🏠</div>
                    <h4>住家阿姨</h4>
                    <p>长期稳定</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 服务项目 -->
<section class="section section-cream" id="services">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Services</span>
            <h2 class="section-title">服务项目</h2>
            <p class="section-desc">专业、贴心、可靠的家政服务</p>
        </div>
        
        <div class="services-grid">
            <?php
            $services_query = new WP_Query(array(
                'post_type' => 'services',
                'posts_per_page' => 6,
                'orderby' => 'menu_order date',
                'order' => 'ASC',
            ));
            
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
                    $service_icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: '📋';
                    $service_image = get_post_meta(get_the_ID(), '_service_image', true);
                    $service_tag = get_post_meta(get_the_ID(), '_service_tag', true);
                    $service_excerpt = get_the_excerpt();
            ?>
                <div class="service-card">
                    <div class="service-icon">
                        <?php if ($service_image) : ?>
                            <img src="<?php echo esc_url($service_image); ?>" alt="<?php the_title_attribute(); ?>" class="service-image">
                        <?php else : ?>
                            <?php echo esc_html($service_icon); ?>
                        <?php endif; ?>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title"><?php the_title(); ?></h3>
                        <p class="service-desc"><?php echo esc_html($service_excerpt); ?></p>
                        <?php if ($service_tag) : ?>
                            <span class="service-tag"><?php echo esc_html($service_tag); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="service-card">
                    <div class="service-icon">👩‍🍼</div>
                    <div class="service-content">
                        <h3 class="service-title">月嫂服务</h3>
                        <p class="service-desc">专业月嫂，照顾产妇和新生儿，科学坐月子。</p>
                        <span class="service-tag">热门推荐</span>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">👵</div>
                    <div class="service-content">
                        <h3 class="service-title">照顾老人</h3>
                        <p class="service-desc">专业护工，照顾老人日常起居，陪护就医。</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">⏰</div>
                    <div class="service-content">
                        <h3 class="service-title">钟点工</h3>
                        <p class="service-desc">灵活预约，按小时计费，随叫随到。</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏠</div>
                    <div class="service-content">
                        <h3 class="service-title">住家阿姨</h3>
                        <p class="service-desc">长期住家服务，稳定可靠。</p>
                        <span class="service-tag">长期稳定</span>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">✨</div>
                    <div class="service-content">
                        <h3 class="service-title">日常保洁</h3>
                        <p class="service-desc">定期上门清洁，让家始终保持整洁。</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏗️</div>
                    <div class="service-content">
                        <h3 class="service-title">新房开荒</h3>
                        <p class="service-desc">新房装修后首次清洁，让新家焕然一新。</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 关于我们 -->
<section class="section" id="about">
    <div class="container">
        <div class="about-section">
            <?php if ($about_image) : ?>
            <div class="about-image-wrapper">
                <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr($company_contact); ?>" class="about-avatar-img">
                <span class="about-image-name"><?php echo esc_html($company_contact); ?></span>
            </div>
            <?php else : ?>
            <div class="about-image">
                👩
                <span><?php echo esc_html($company_contact); ?></span>
            </div>
            <?php endif; ?>
            
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

<!-- 特色优势 -->
<section class="section section-cream">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Why Choose Us</span>
            <h2 class="section-title">为什么选择我们</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><?php echo esc_html($feature1_icon); ?></div>
                <h4 class="feature-title"><?php echo esc_html($feature1_title); ?></h4>
                <p class="feature-desc"><?php echo esc_html($feature1_desc); ?></p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><?php echo esc_html($feature2_icon); ?></div>
                <h4 class="feature-title"><?php echo esc_html($feature2_title); ?></h4>
                <p class="feature-desc"><?php echo esc_html($feature2_desc); ?></p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><?php echo esc_html($feature3_icon); ?></div>
                <h4 class="feature-title"><?php echo esc_html($feature3_title); ?></h4>
                <p class="feature-desc"><?php echo esc_html($feature3_desc); ?></p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><?php echo esc_html($feature4_icon); ?></div>
                <h4 class="feature-title"><?php echo esc_html($feature4_title); ?></h4>
                <p class="feature-desc"><?php echo esc_html($feature4_desc); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- 客户评价 -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Testimonials</span>
            <h2 class="section-title">客户真实评价</h2>
        </div>
        
        <div class="testimonials-slider">
            <?php
            $testimonials_query = new WP_Query(array(
                'post_type' => 'testimonials',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC',
            ));
            
            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $client_name = get_post_meta(get_the_ID(), '_client_name', true) ?: get_the_title();
                    $client_service = get_post_meta(get_the_ID(), '_client_service', true) ?: '客户';
                    $testimonial_excerpt = get_the_excerpt();
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text"><?php echo esc_html($testimonial_excerpt); ?></p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar"><?php echo mb_substr($client_name, 0, 1); ?></div>
                        <div class="testimonial-info">
                            <h5><?php echo esc_html($client_name); ?></h5>
                            <span><?php echo esc_html($client_service); ?></span>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        <?php echo esc_html($company_contact); ?>介绍的月嫂非常专业，照顾我和宝宝都很细心，让我坐月子期间很安心。强烈推荐！
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">李</div>
                        <div class="testimonial-info">
                            <h5>李女士</h5>
                            <span>月嫂服务客户</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        请了住家阿姨照顾老人，阿姨人很好，有耐心，老人很喜欢。服务态度也很好，值得信赖。
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">王</div>
                        <div class="testimonial-info">
                            <h5>王先生</h5>
                            <span>住家阿姨客户</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        定期叫钟点工来打扫，每次都很干净，价格也实惠。<?php echo esc_html($company_contact); ?>人很热情，服务很到位！
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">张</div>
                        <div class="testimonial-info">
                            <h5>张女士</h5>
                            <span>钟点工客户</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 联系我们 -->
<section class="section section-cream contact-section" id="contact">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Contact Us</span>
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

<?php get_footer(); ?>

<?php
/**
 * 服务页面模板 - 移动端优先设计
 */
get_header();

$company_phone = get_theme_mod('company_phone', '15392956537');
$company_phone2 = get_theme_mod('company_phone2', '15392966758');
$company_address = get_theme_mod('company_address', '湖北省武汉市洪山区珞喻路446号-附1号');
?>

<!-- 页面标题 -->
<div class="page-header">
    <div class="container">
        <h1>服务项目</h1>
        <?php jiejiawang_breadcrumb(); ?>
    </div>
</div>

<!-- 服务列表 -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Services</span>
            <h2 class="section-title">专业服务项目</h2>
            <p class="section-desc">用心服务，温暖每一个家</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">👩‍🍼</div>
                <div class="service-content">
                    <h3 class="service-title">月嫂服务</h3>
                    <p class="service-desc">专业月嫂，照顾产妇和新生儿，科学坐月子，让妈妈和宝宝得到最好的照顾。包括产妇护理、新生儿护理、营养餐制作等。</p>
                    <span class="service-tag">热门推荐</span>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">👵</div>
                <div class="service-content">
                    <h3 class="service-title">照顾老人</h3>
                    <p class="service-desc">专业护工，照顾老人日常起居，陪护就医，让老人安享晚年，子女安心工作。包括日常陪护、就医陪诊、心理疏导等。</p>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">⏰</div>
                <div class="service-content">
                    <h3 class="service-title">钟点工</h3>
                    <p class="service-desc">灵活预约，按小时计费，日常保洁、做饭、洗衣等，随叫随到，方便快捷。适合临时性、周期性的家务需求。</p>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🏠</div>
                <div class="service-content">
                    <h3 class="service-title">住家阿姨</h3>
                    <p class="service-desc">长期住家服务，负责日常家务、做饭、照顾孩子老人，稳定可靠，省心放心。适合需要长期家政服务的家庭。</p>
                    <span class="service-tag">长期稳定</span>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">✨</div>
                <div class="service-content">
                    <h3 class="service-title">日常保洁</h3>
                    <p class="service-desc">定期上门清洁，地面打扫、家具擦拭、厨卫清洁，让您的家始终保持整洁。可按周、半月、月等周期预约。</p>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🏗️</div>
                <div class="service-content">
                    <h3 class="service-title">新房开荒</h3>
                    <p class="service-desc">新房装修后首次清洁，清除装修残留，让新家焕然一新，为您入住做好准备。包括地面、墙面、玻璃、厨卫等全面清洁。</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 服务流程 -->
<section class="section section-cream">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Process</span>
            <h2 class="section-title">服务流程</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📞</div>
                <h4 class="feature-title">电话咨询</h4>
                <p class="feature-desc">拨打热线说明需求</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">💬</div>
                <h4 class="feature-title">需求确认</h4>
                <p class="feature-desc">确认服务内容和时间</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h4 class="feature-title">人员匹配</h4>
                <p class="feature-desc">为您匹配合适人员</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">✅</div>
                <h4 class="feature-title">满意服务</h4>
                <p class="feature-desc">不满意可更换</p>
            </div>
        </div>
    </div>
</section>

<!-- 联系CTA -->
<section class="section contact-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Contact</span>
            <h2 class="section-title">立即咨询</h2>
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

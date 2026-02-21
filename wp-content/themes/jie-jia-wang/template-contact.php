<?php
/**
 * 联系页面模板 - 全新设计
 */
get_header();

$company_name = get_theme_mod('company_name', '武汉洁净旺家家政服务部');
$company_phone = get_theme_mod('company_phone', '400-888-8888');
$company_address = get_theme_mod('company_address', '湖北省武汉市');
$company_email = get_theme_mod('company_email', 'info@jiejingwang.com');
?>

<!-- 页面标题 -->
<div class="page-header">
    <div class="container">
        <h1>联系我们</h1>
        <p class="page-breadcrumb">
            <a href="<?php echo home_url(); ?>">首页</a> / 联系我们
        </p>
    </div>
</div>

<!-- 联系区域 -->
<section class="section">
    <div class="container">
        <div class="contact-section">
            <!-- 联系信息 -->
            <div class="contact-info">
                <div class="contact-info-card">
                    <h3>联系方式</h3>
                    
                    <div class="contact-item">
                        <div class="contact-item-icon">📞</div>
                        <div class="contact-item-content">
                            <h5>联系电话</h5>
                            <p><?php echo esc_html($company_phone); ?></p>
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
                        <div class="contact-item-icon">✉️</div>
                        <div class="contact-item-content">
                            <h5>电子邮箱</h5>
                            <p><?php echo esc_html($company_email); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-item-icon">🕐</div>
                        <div class="contact-item-content">
                            <h5>营业时间</h5>
                            <p>周一至周日 8:00-20:00</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- 联系表单 -->
            <div class="contact-form-wrapper">
                <h3>在线预约</h3>
                <p>请填写以下表单，我们将尽快与您联系</p>
                
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">您的姓名 *</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="请输入您的姓名" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">联系电话 *</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="请输入您的联系电话" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">电子邮箱</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="请输入您的电子邮箱（选填）">
                        </div>
                        
                        <div class="form-group">
                            <label for="service">服务类型</label>
                            <select id="service" name="service" class="form-control">
                                <option value="">请选择服务类型</option>
                                <option value="daily">日常保洁</option>
                                <option value="deep">深度清洁</option>
                                <option value="appliance">家电清洗</option>
                                <option value="opening">开荒保洁</option>
                                <option value="window">擦玻璃</option>
                                <option value="organization">收纳整理</option>
                                <option value="other">其他服务</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">留言内容 *</label>
                        <textarea id="message" name="message" class="form-control" placeholder="请描述您的需求，如服务时间、房屋面积等" rows="5" required></textarea>
                    </div>
                    
                    <div class="text-center" style="margin-top: 10px;">
                        <button type="submit" class="btn btn-primary" style="padding: 18px 60px;">提交预约</button>
                    </div>
                </form>
            </div>
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
        
        <div class="services-grid" style="grid-template-columns: repeat(4, 1fr); gap: 20px;">
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">江岸区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">江汉区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">硚口区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">汉阳区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">武昌区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">洪山区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">青山区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">蔡甸区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">江夏区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">黄陂区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">新洲区</p>
            </div>
            <div class="service-card" style="text-align: center; padding: 25px;">
                <p style="margin: 0; color: var(--text-secondary);">东西湖区</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="stats-section">
    <div class="container text-center">
        <h2 style="color: white; margin-bottom: 15px;">立即拨打预约热线</h2>
        <p style="color: rgba(255,255,255,0.8); margin-bottom: 30px; font-size: 1.1rem;">专业团队，随时为您服务</p>
        <a href="tel:<?php echo esc_html($company_phone); ?>" class="btn btn-accent" style="padding: 18px 50px; font-size: 1.2rem;">
            📞 <?php echo esc_html($company_phone); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>

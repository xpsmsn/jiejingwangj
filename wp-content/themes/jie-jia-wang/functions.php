<?php
/**
 * 洁净旺家主题功能文件
 */

/**
 * 主题初始化设置
 */
function jiejiawang_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('editor-styles');
    add_editor_style('style.css');
    register_nav_menus(array(
        'primary' => __('主导航菜单', 'jie-jia-wang'),
        'footer' => __('页脚菜单', 'jie-jia-wang'),
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'jiejiawang_setup');

/**
 * 加载主题样式和脚本
 */
function jiejiawang_scripts() {
    wp_enqueue_style('jie-jia-wang-style', get_stylesheet_uri());
    wp_enqueue_style('jie-jia-wang-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@300;400;500;600;700&family=Noto+Serif+SC:wght@400;500;600;700&display=swap', array(), null);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'jiejiawang_scripts');

/**
 * 注册自定义文章类型 - 服务项目
 */
function jiejiawang_register_services() {
    register_post_type('services', array(
        'labels' => array(
            'name'               => '服务项目',
            'singular_name'      => '服务项目',
            'add_new'            => '添加新服务',
            'add_new_item'       => '添加新服务项目',
            'edit_item'          => '编辑服务项目',
            'new_item'           => '新服务项目',
            'view_item'          => '查看服务项目',
            'search_items'       => '搜索服务项目',
            'not_found'          => '未找到服务项目',
            'not_found_in_trash' => '回收站中无服务项目',
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-list-view',
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'  => true,
        'rewrite'       => array('slug' => 'services'),
    ));
}
add_action('init', 'jiejiawang_register_services');

/**
 * 注册自定义文章类型 - 客户评价
 */
function jiejiawang_register_testimonials() {
    register_post_type('testimonials', array(
        'labels' => array(
            'name'               => '客户评价',
            'singular_name'      => '客户评价',
            'add_new'            => '添加新评价',
            'add_new_item'       => '添加新客户评价',
            'edit_item'          => '编辑客户评价',
            'new_item'           => '新客户评价',
            'view_item'          => '查看客户评价',
            'search_items'       => '搜索客户评价',
            'not_found'          => '未找到客户评价',
            'not_found_in_trash' => '回收站中无客户评价',
        ),
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => array('title', 'editor', 'excerpt'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'jiejiawang_register_testimonials');

/**
 * 为客户评价添加自定义字段
 */
function jiejiawang_add_testimonial_meta_box() {
    add_meta_box(
        'testimonial_details',
        '客户信息',
        'jiejiawang_testimonial_meta_box_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'jiejiawang_add_testimonial_meta_box');

function jiejiawang_testimonial_meta_box_callback($post) {
    wp_nonce_field('jiejiawang_testimonial_nonce', 'jiejiawang_testimonial_nonce');
    $client_name = get_post_meta($post->ID, '_client_name', true);
    $client_service = get_post_meta($post->ID, '_client_service', true);
    ?>
    <div style="background: #f0f6fc; border-left: 4px solid #2271b1; padding: 12px; margin-bottom: 15px;">
        <strong>💡 显示建议：</strong>
        <ul style="margin: 8px 0 0 20px; line-height: 1.6;">
            <li>评价内容建议 <strong>50-80字</strong>，显示效果最佳</li>
            <li>内容会完整显示，不会被截断</li>
        </ul>
    </div>
    <p>
        <label for="client_name">客户姓名：</label>
        <input type="text" id="client_name" name="client_name" value="<?php echo esc_attr($client_name); ?>" class="widefat">
    </p>
    <p>
        <label for="client_service">服务类型：</label>
        <input type="text" id="client_service" name="client_service" value="<?php echo esc_attr($client_service); ?>" class="widefat" placeholder="如：月嫂服务客户">
    </p>
    <?php
}

function jiejiawang_save_testimonial_meta($post_id) {
    if (!isset($_POST['jiejiawang_testimonial_nonce']) || !wp_verify_nonce($_POST['jiejiawang_testimonial_nonce'], 'jiejiawang_testimonial_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['client_name'])) {
        update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
    }
    if (isset($_POST['client_service'])) {
        update_post_meta($post_id, '_client_service', sanitize_text_field($_POST['client_service']));
    }
}
add_action('save_post_testimonials', 'jiejiawang_save_testimonial_meta');

/**
 * 为服务项目添加自定义字段
 */
function jiejiawang_add_service_meta_box() {
    add_meta_box(
        'service_details',
        '服务详情',
        'jiejiawang_service_meta_box_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'jiejiawang_add_service_meta_box');

function jiejiawang_service_meta_box_callback($post) {
    wp_nonce_field('jiejiawang_service_nonce', 'jiejiawang_service_nonce');
    $service_icon = get_post_meta($post->ID, '_service_icon', true);
    $service_tag = get_post_meta($post->ID, '_service_tag', true);
    ?>
    <div style="background: #f0f6fc; border-left: 4px solid #2271b1; padding: 12px; margin-bottom: 15px;">
        <strong>💡 显示建议：</strong>
        <ul style="margin: 8px 0 0 20px; line-height: 1.6;">
            <li>服务描述建议 <strong>30-50字</strong>，显示效果最佳</li>
            <li>内容会完整显示，不会被截断</li>
            <li>标签建议4个字以内，如"热门推荐"</li>
        </ul>
    </div>
    <p>
        <label for="service_icon">服务图标（emoji）：</label>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($service_icon); ?>" class="small-text" placeholder="如：👩‍🍼">
        <span class="description">输入emoji表情符号，或上传图片</span>
    </p>
    <p>
        <label for="service_image">服务图片：</label><br>
        <input type="hidden" id="service_image" name="service_image" value="<?php echo esc_attr(get_post_meta($post->ID, '_service_image', true)); ?>">
        <button type="button" class="button upload-service-image">上传图片</button>
        <button type="button" class="button remove-service-image" style="<?php echo get_post_meta($post->ID, '_service_image', true) ? '' : 'display:none;'; ?>">移除图片</button>
        <div class="service-image-preview" style="margin-top:10px;">
            <?php 
            $service_image = get_post_meta($post->ID, '_service_image', true);
            if ($service_image) {
                echo '<img src="' . esc_url($service_image) . '" style="max-width:100px;max-height:100px;border-radius:8px;">';
            }
            ?>
        </div>
        <span class="description">上传图片后，将优先显示图片而非emoji图标</span>
    </p>
    <p>
        <label for="service_tag">服务标签：</label>
        <input type="text" id="service_tag" name="service_tag" value="<?php echo esc_attr($service_tag); ?>" class="regular-text" placeholder="如：热门推荐（留空则不显示）">
    </p>
    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        $('.upload-service-image').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: '选择服务图片',
                button: { text: '选择图片' },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#service_image').val(attachment.url);
                $('.service-image-preview').html('<img src="' + attachment.url + '" style="max-width:100px;max-height:100px;border-radius:8px;">');
                $('.remove-service-image').show();
            });
            mediaUploader.open();
        });
        $('.remove-service-image').click(function(e) {
            e.preventDefault();
            $('#service_image').val('');
            $('.service-image-preview').html('');
            $(this).hide();
        });
    });
    </script>
    <?php
}

function jiejiawang_save_service_meta($post_id) {
    if (!isset($_POST['jiejiawang_service_nonce']) || !wp_verify_nonce($_POST['jiejiawang_service_nonce'], 'jiejiawang_service_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
    if (isset($_POST['service_tag'])) {
        update_post_meta($post_id, '_service_tag', sanitize_text_field($_POST['service_tag']));
    }
    if (isset($_POST['service_image'])) {
        update_post_meta($post_id, '_service_image', esc_url_raw($_POST['service_image']));
    }
}
add_action('save_post_services', 'jiejiawang_save_service_meta');

/**
 * 企业信息自定义设置
 */
function jiejiawang_theme_customizer($wp_customize) {
    
    // ========== 企业信息设置 ==========
    $wp_customize->add_section('jieja_config', array(
        'title'    => __('企业信息设置', 'jie-jia-wang'),
        'priority' => 30,
    ));
    
    $company_settings = array(
        'company_name' => array('default' => '武汉洁净旺家家政服务部', 'label' => '公司名称'),
        'company_phone' => array('default' => '15392956537', 'label' => '联系电话'),
        'company_phone2' => array('default' => '15392966758', 'label' => '备用电话'),
        'company_contact' => array('default' => '章阿姨', 'label' => '联系人'),
        'company_address' => array('default' => '湖北省武汉市洪山区珞喻路446号-附1号', 'label' => '联系地址'),
        'company_email' => array('default' => 'info@jiejingwang.com', 'label' => '联系邮箱'),
        'company_desc' => array('default' => '专注月嫂、照顾老人、钟点工、住家阿姨、日常保洁等服务。十年深耕武汉，用心服务每一个家庭。', 'label' => '企业简介'),
        'company_years' => array('default' => '10', 'label' => '服务年限'),
        'company_families' => array('default' => '3000', 'label' => '服务家庭数'),
        'company_satisfaction' => array('default' => '98', 'label' => '客户满意度(%)'),
        'business_hours' => array('default' => '周一至周日 8:00-20:00', 'label' => '营业时间'),
    );
    
    foreach ($company_settings as $key => $setting) {
        $type = ($key === 'company_email') ? 'email' : (($key === 'company_desc') ? 'textarea' : 'text');
        $wp_customize->add_setting($key, array(
            'default' => $setting['default'],
            'sanitize_callback' => $type === 'email' ? 'sanitize_email' : ($type === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field'),
        ));
        $wp_customize->add_control($key, array(
            'label' => __($setting['label'], 'jie-jia-wang'),
            'section' => 'jieja_config',
            'type' => $type,
        ));
    }
    
    // ========== 首页设置 ==========
    $wp_customize->add_section('jieja_home', array(
        'title'    => __('首页设置', 'jie-jia-wang'),
        'priority' => 35,
    ));
    
    $home_settings = array(
        'hero_title' => array('default' => '用心服务', 'label' => '英雄区标题'),
        'hero_subtitle' => array('default' => '温暖每一个家', 'label' => '英雄区副标题'),
        'hero_badge' => array('default' => '武汉洪山区 · 专业家政服务', 'label' => '英雄区标签'),
        'hero_desc' => array('default' => '洁净旺家家政，专注月嫂、照顾老人、钟点工、住家阿姨、日常保洁等服务。十年深耕武汉，用心服务每一个家庭。', 'label' => '英雄区描述'),
        'about_title' => array('default' => '一个有温度的家政品牌', 'label' => '关于区标题'),
        'about_text1' => array('default' => '武汉洁净旺家家政服务部，位于洪山区珞喻路，由章阿姨创办。我们相信，一个温馨的家，需要用心的呵护。', 'label' => '关于区文字1'),
        'about_text2' => array('default' => '十年来，我们始终坚持"用心服务、真诚待人"的理念，把每一位客户的家当作自己的家来打理。我们不只是服务者，更是您生活中的好帮手。', 'label' => '关于区文字2'),
        'about_quote' => array('default' => '把每一个家都当作自己的家来打理，让服务成为一种温暖。', 'label' => '关于区引言'),
    );
    
    foreach ($home_settings as $key => $setting) {
        $wp_customize->add_setting($key, array(
            'default' => $setting['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($key, array(
            'label' => __($setting['label'], 'jie-jia-wang'),
            'section' => 'jieja_home',
            'type' => 'text',
        ));
    }
    
    // ========== 图片设置 ==========
    $wp_customize->add_setting('hero_background', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label' => __('首页背景图片', 'jie-jia-wang'),
        'section' => 'jieja_home',
        'description' => '上传横版背景图片（建议尺寸：1920x1080）',
    )));
    
    $wp_customize->add_setting('about_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => __('关于我们图片', 'jie-jia-wang'),
        'section' => 'jieja_home',
        'description' => '上传创始人或团队图片（建议尺寸：400x400）',
    )));
    
    // ========== 特色优势图标设置 ==========
    $wp_customize->add_section('jieja_features', array(
        'title'    => __('特色优势设置', 'jie-jia-wang'),
        'priority' => 36,
    ));
    
    $features_settings = array(
        'feature1_icon' => array('default' => '👩‍🏫', 'label' => '特色1-图标'),
        'feature1_title' => array('default' => '专业培训', 'label' => '特色1-标题'),
        'feature1_desc' => array('default' => '持证上岗，技能娴熟', 'label' => '特色1-描述'),
        'feature2_icon' => array('default' => '🛡️', 'label' => '特色2-图标'),
        'feature2_title' => array('default' => '安全保障', 'label' => '特色2-标题'),
        'feature2_desc' => array('default' => '实名认证，背景调查', 'label' => '特色2-描述'),
        'feature3_icon' => array('default' => '⭐', 'label' => '特色3-图标'),
        'feature3_title' => array('default' => '品质保证', 'label' => '特色3-标题'),
        'feature3_desc' => array('default' => '不满意可更换', 'label' => '特色3-描述'),
        'feature4_icon' => array('default' => '💰', 'label' => '特色4-图标'),
        'feature4_title' => array('default' => '透明定价', 'label' => '特色4-标题'),
        'feature4_desc' => array('default' => '明码标价，无隐形消费', 'label' => '特色4-描述'),
    );
    
    foreach ($features_settings as $key => $setting) {
        $wp_customize->add_setting($key, array(
            'default' => $setting['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control($key, array(
            'label' => __($setting['label'], 'jie-jia-wang'),
            'section' => 'jieja_features',
            'type' => 'text',
        ));
    }
    
    // ========== 二维码设置 ==========
    $wp_customize->add_setting('wechat_qrcode', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wechat_qrcode', array(
        'label' => __('微信二维码', 'jie-jia-wang'),
        'section' => 'jieja_config',
        'description' => '上传微信二维码图片，显示在页脚',
    )));
}
add_action('customize_register', 'jiejiawang_theme_customizer');

/**
 * 面包屑导航
 */
function jiejiawang_breadcrumb() {
    if (!is_front_page()) {
        echo '<div class="page-breadcrumb">';
        echo '<a href="' . home_url() . '">首页</a>';
        if (is_page() || is_single()) {
            echo ' / ';
            the_title();
        }
        echo '</div>';
    }
}

/**
 * 移除WordPress版本号
 */
remove_action('wp_head', 'wp_generator');

/**
 * 主题激活时创建默认数据
 */
function jiejiawang_activate_theme() {
    // 检查是否已经创建过默认数据
    if (get_option('jiejiawang_default_data_created')) {
        return;
    }
    
    // 创建默认服务项目
    $default_services = array(
        array(
            'title' => '月嫂服务',
            'content' => '专业月嫂，照顾产妇和新生儿，科学坐月子，让妈妈和宝宝得到最好的照顾。包括产妇护理、新生儿护理、营养餐制作、产后恢复指导等全方位服务。',
            'icon' => '👩‍🍼',
            'tag' => '热门推荐',
        ),
        array(
            'title' => '照顾老人',
            'content' => '专业护工，照顾老人日常起居，陪护就医，让老人安享晚年，子女安心工作。包括日常陪护、就医陪诊、心理疏导、康复训练协助等服务。',
            'icon' => '👵',
            'tag' => '',
        ),
        array(
            'title' => '钟点工',
            'content' => '灵活预约，按小时计费，日常保洁、做饭、洗衣等，随叫随到，方便快捷。适合临时性、周期性的家务需求，让您轻松享受生活。',
            'icon' => '⏰',
            'tag' => '',
        ),
        array(
            'title' => '住家阿姨',
            'content' => '长期住家服务，负责日常家务、做饭、照顾孩子老人，稳定可靠，省心放心。适合需要长期家政服务的家庭，让您无后顾之忧。',
            'icon' => '🏠',
            'tag' => '长期稳定',
        ),
        array(
            'title' => '日常保洁',
            'content' => '定期上门清洁，地面打扫、家具擦拭、厨卫清洁，让您的家始终保持整洁。可按周、半月、月等周期预约，保持家居环境清新舒适。',
            'icon' => '✨',
            'tag' => '',
        ),
        array(
            'title' => '新房开荒',
            'content' => '新房装修后首次清洁，清除装修残留，让新家焕然一新，为您入住做好准备。包括地面、墙面、玻璃、厨卫等全面清洁服务。',
            'icon' => '🏗️',
            'tag' => '',
        ),
    );
    
    foreach ($default_services as $index => $service) {
        $post_id = wp_insert_post(array(
            'post_type' => 'services',
            'post_title' => $service['title'],
            'post_content' => $service['content'],
            'post_excerpt' => $service['content'],
            'post_status' => 'publish',
            'menu_order' => $index,
        ));
        
        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_service_icon', $service['icon']);
            if ($service['tag']) {
                update_post_meta($post_id, '_service_tag', $service['tag']);
            }
        }
    }
    
    // 创建默认客户评价
    $default_testimonials = array(
        array(
            'title' => '月嫂服务评价',
            'content' => '章阿姨介绍的月嫂非常专业，照顾我和宝宝都很细心，让我坐月子期间很安心。月嫂阿姨不仅照顾宝宝很专业，还会做很多营养餐，强烈推荐！',
            'client_name' => '李女士',
            'client_service' => '月嫂服务客户',
        ),
        array(
            'title' => '住家阿姨评价',
            'content' => '请了住家阿姨照顾老人，阿姨人很好，有耐心，老人很喜欢。服务态度也很好，做事勤快，值得信赖。已经合作半年多了，非常满意。',
            'client_name' => '王先生',
            'client_service' => '住家阿姨客户',
        ),
        array(
            'title' => '钟点工评价',
            'content' => '定期叫钟点工来打扫，每次都很干净，价格也实惠。章阿姨人很热情，服务很到位！预约也很方便，随叫随到，非常满意。',
            'client_name' => '张女士',
            'client_service' => '钟点工客户',
        ),
    );
    
    foreach ($default_testimonials as $testimonial) {
        $post_id = wp_insert_post(array(
            'post_type' => 'testimonials',
            'post_title' => $testimonial['title'],
            'post_content' => $testimonial['content'],
            'post_excerpt' => $testimonial['content'],
            'post_status' => 'publish',
        ));
        
        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_client_name', $testimonial['client_name']);
            update_post_meta($post_id, '_client_service', $testimonial['client_service']);
        }
    }
    
    // 标记已创建默认数据
    update_option('jiejiawang_default_data_created', true);
}
add_action('after_switch_theme', 'jiejiawang_activate_theme');

/**
 * 在admin_init时也检查，确保数据被创建
 */
function jiejiawang_check_default_data() {
    if (!get_option('jiejiawang_default_data_created')) {
        jiejiawang_activate_theme();
    }
}
add_action('admin_init', 'jiejiawang_check_default_data');

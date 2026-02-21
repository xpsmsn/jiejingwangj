<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="theme-color" content="#FFFBF5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@300;400;500;600;700&family=Noto+Serif+SC:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .site-logo.has-logo::before { display: none; }
        .site-logo img { max-height: 28px; width: auto; }
        @media (min-width: 1024px) {
            .site-logo img { max-height: 32px; }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$company_phone = get_theme_mod('company_phone', '15392956537');
$is_front_page = is_front_page();
?>

<!-- 顶部品牌栏（移动端） -->
<div class="top-bar">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo <?php echo has_custom_logo() ? 'has-logo' : ''; ?>">
        <?php
        if (has_custom_logo()) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
        } else {
            echo '<span class="site-logo-text">' . get_bloginfo('name') . '</span>';
        }
        ?>
    </a>
    <a href="tel:<?php echo esc_attr($company_phone); ?>" class="top-bar-contact">
        📞 电话咨询
    </a>
</div>

<!-- 桌面端导航栏 -->
<nav class="desktop-navigation">
    <div class="container">
        <div class="desktop-nav-wrapper">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo <?php echo has_custom_logo() ? 'has-logo' : ''; ?>">
                <?php
                if (has_custom_logo()) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                } else {
                    echo '<span class="site-logo-text">' . get_bloginfo('name') . '</span>';
                }
                ?>
            </a>
            
            <!-- 导航链接 -->
            <div class="desktop-nav-links">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="desktop-nav-link <?php echo $is_front_page ? 'active' : ''; ?>">首页</a>
                <a href="<?php echo $is_front_page ? '#services' : esc_url(home_url('/#services')); ?>" class="desktop-nav-link">服务项目</a>
                <a href="<?php echo $is_front_page ? '#about' : esc_url(home_url('/#about')); ?>" class="desktop-nav-link">关于我们</a>
                <a href="<?php echo $is_front_page ? '#contact' : esc_url(home_url('/#contact')); ?>" class="desktop-nav-link">联系我们</a>
            </div>
            
            <!-- 电话按钮 -->
            <a href="tel:<?php echo esc_attr($company_phone); ?>" class="desktop-nav-phone">
                📞 <?php echo esc_html($company_phone); ?>
            </a>
        </div>
    </div>
</nav>

<!-- 底部导航栏（移动端） -->
<nav class="main-navigation">
    <div class="nav-container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-item <?php echo $is_front_page ? 'active' : ''; ?>">
            <span class="nav-item-icon">🏠</span>
            <span>首页</span>
        </a>
        <a href="<?php echo $is_front_page ? '#services' : esc_url(home_url('/#services')); ?>" class="nav-item">
            <span class="nav-item-icon">📋</span>
            <span>服务</span>
        </a>
        <a href="<?php echo $is_front_page ? '#about' : esc_url(home_url('/#about')); ?>" class="nav-item">
            <span class="nav-item-icon">👤</span>
            <span>关于</span>
        </a>
        <a href="tel:<?php echo esc_attr($company_phone); ?>" class="nav-item">
            <span class="nav-item-icon">📞</span>
            <span>电话</span>
        </a>
    </div>
</nav>

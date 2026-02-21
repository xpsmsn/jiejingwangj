# 洁净旺家 - WordPress家政服务主题

一个专为家政服务行业设计的WordPress主题，采用移动端优先设计理念，温暖的大地色调配色方案。

## 功能特点

- 📱 **移动端优先设计** - 完美适配手机、平板、桌面端
- 🎨 **温暖大地色调** - 奶油色、棕色、赤陶色配色方案
- 🔧 **可视化编辑** - 所有内容都可在WordPress后台编辑
- 📞 **一键拨号** - 电话按钮直接拨打
- 🖼️ **自定义图片** - 支持上传背景图、头像、服务图片等
- 📋 **自定义文章类型** - 服务项目、客户评价独立管理
- 🌐 **SEO友好** - 语义化HTML结构

## 安装说明

### 环境要求

- WordPress 5.0+
- PHP 7.4+
- 推荐使用经典编辑器或Gutenberg编辑器

### 安装步骤

1. 下载主题zip包 `jie-jia-wang-v3.zip`
2. 进入WordPress后台 → 外观 → 主题 → 添加新主题 → 上传主题
3. 选择zip文件并点击"现在安装"
4. 安装完成后点击"启用"
5. 主题会自动创建默认的服务项目和客户评价数据

### 首次配置

1. **设置首页**
   - 设置 → 阅读 → 主页显示 → 选择"静态页面"
   - 创建一个新页面，选择"首页模板"（或直接使用front-page.php）

2. **配置企业信息**
   - 外观 → 自定义 → 企业信息设置
   - 填写公司名称、电话、地址等信息

3. **上传Logo**
   - 外观 → 自定义 → 站点身份 → 选择Logo

4. **上传背景图**
   - 外观 → 自定义 → 首页设置 → 首页背景图片

## 使用说明

### 服务项目管理

- 后台左侧菜单 → 服务项目 → 添加新服务
- 可设置：标题、描述、emoji图标、图片、标签
- 建议描述字数：30-50字

### 客户评价管理

- 后台左侧菜单 → 客户评价 → 添加新评价
- 可设置：评价内容、客户姓名、服务类型
- 建议评价字数：50-80字

### 自定义设置位置

| 设置项 | 位置 |
|-------|------|
| 公司名称、电话、地址 | 外观 → 自定义 → 企业信息设置 |
| 英雄区标题、描述 | 外观 → 自定义 → 首页设置 |
| 首页背景图 | 外观 → 自定义 → 首页设置 |
| 关于我们图片 | 外观 → 自定义 → 首页设置 |
| 特色优势设置 | 外观 → 自定义 → 特色优势设置 |
| 微信二维码 | 外观 → 自定义 → 企业信息设置 |
| Logo | 外观 → 自定义 → 站点身份 |

## 文件结构

```
jie-jia-wang/
├── style.css              # 主样式文件
├── functions.php          # 主题功能文件
├── header.php             # 页头模板
├── footer.php             # 页脚模板
├── front-page.php         # 首页模板
├── index.php              # 默认模板
├── page.php               # 页面模板
├── single.php             # 文章详情模板
├── template-services.php  # 服务页面模板
├── template-about.php     # 关于页面模板
├── screenshot.png         # 主题预览图
└── js/
    └── navigation.js      # 导航脚本
```

## 自定义文章类型

### services（服务项目）

字段说明：
- `post_title` - 服务名称
- `post_excerpt` - 服务描述
- `_service_icon` - emoji图标
- `_service_image` - 服务图片URL
- `_service_tag` - 服务标签（如"热门推荐"）

### testimonials（客户评价）

字段说明：
- `post_excerpt` - 评价内容
- `_client_name` - 客户姓名
- `_client_service` - 服务类型

---

## 更新日志 (CHANGELOG)

### v3.1.0 (2026-02-19)

#### 优化改进
- 💄 优化关于我们区域头像设计
  - 头像尺寸从120px增大到140px
  - 名字使用主题色(赤陶色)显示在图片下方
  - 增加柔和扩散阴影效果
  - 白色边框从3px增加到4px

### v3.0.0 (2026-02-16)

#### 新增功能
- ✨ 移动端优先设计，底部导航栏
- ✨ 桌面端独立导航栏，显示Logo和电话
- ✨ 首页背景图片自定义
- ✨ 服务项目支持上传图片
- ✨ 关于我们区域图片自定义
- ✨ 特色优势图标和文字可自定义
- ✨ 页脚微信二维码上传
- ✨ 主题激活自动创建默认数据
- ✨ 编辑器中显示字数建议

#### 问题修复
- 🐛 修复Logo棕色方块无法移除的问题
- 🐛 修复导航链接跳转404的问题
- 🐛 修复桌面端导航遮挡内容的问题
- 🐛 修复页脚布局偏左的问题
- 🐛 修复关于我们图片被名字遮挡的问题
- 🐛 修复文字被截断显示省略号的问题
- 🐛 修复主题没有预览图的问题

#### 优化改进
- 💄 移除页面中的提示文字
- 💄 页脚重新设计，三栏布局
- 💄 内容完整显示，不再截断
- 💄 所有内容可通过WordPress后台编辑

---

## 开发踩坑记录

### 1. WordPress自定义器设置不生效

**问题**：在自定义器中设置了值，但前端没有变化。

**原因**：模板文件中使用了硬编码的默认值，没有正确调用`get_theme_mod()`。

**解决方案**：
```php
// 错误写法
$phone = '15392956537';

// 正确写法
$phone = get_theme_mod('company_phone', '15392956537');
```

### 2. Logo上传后仍有棕色方块

**问题**：上传Logo后，原来的棕色方块仍然显示。

**原因**：CSS中使用`::before`伪元素创建的方块，没有根据是否有Logo来隐藏。

**解决方案**：
```css
.site-logo.has-logo::before { display: none; }
```
```php
// 在header.php中添加has-logo类
<a href="..." class="site-logo <?php echo has_custom_logo() ? 'has-logo' : ''; ?>">
```

### 3. 导航锚点跳转404

**问题**：点击"服务"、"关于"导航跳转到新页面报404。

**原因**：链接写成了`/services`，而不是首页的锚点`#services`。

**解决方案**：
```php
// 判断是否在首页，动态生成链接
href="<?php echo $is_front_page ? '#services' : esc_url(home_url('/#services')); ?>"
```

### 4. 桌面端导航遮挡内容

**问题**：桌面端导航栏切换到顶部后，页面内容被遮挡。

**原因**：
1. 导航栏使用`position: fixed`但没有给body添加padding
2. 没有独立的桌面端导航，直接复用移动端导航

**解决方案**：
- 创建独立的桌面端导航组件
- 给body添加`padding-top: 70px`

### 5. 文字被截断显示省略号

**问题**：服务描述和客户评价显示不完整，末尾是省略号。

**原因**：使用了`wp_trim_words()`函数截断文字。

**解决方案**：
```php
// 错误写法
echo wp_trim_words(get_the_excerpt(), 30);

// 正确写法 - 直接输出完整内容
echo get_the_excerpt();
```

### 6. 主题没有预览图

**问题**：主题安装后显示空白预览图。

**原因**：使用了`screenshot.txt`而不是`screenshot.png`。

**解决方案**：
- 删除`screenshot.txt`
- 创建`screenshot.png`（1200x900px）

### 7. 自定义文章类型数据丢失

**问题**：重新上传主题后，服务项目和客户评价数据丢失。

**原因**：数据存储在数据库中，主题更新不会影响数据，但用户可能误以为是主题问题。

**解决方案**：
- 添加主题激活钩子，自动创建默认数据
- 使用`get_option()`标记是否已创建，避免重复创建

### 8. 图片上传后遮挡文字

**问题**：关于我们区域上传图片后，名字遮挡在图片上。

**原因**：名字使用绝对定位覆盖在图片上。

**解决方案**：
- 上传图片时，使用独立的wrapper结构
- 名字显示在图片下方，而不是覆盖

---

## 后续AI修改指南

### 修改配色

编辑 `style.css` 中的CSS变量：
```css
:root {
    --cream-50: #FFFBF5;
    --brown-900: #3D2C1E;
    --terracotta-500: #B56E52;
    /* ... */
}
```

### 添加新的自定义设置

在 `functions.php` 的 `jiejiawang_theme_customizer()` 函数中添加：
```php
$wp_customize->add_setting('your_setting', array(
    'default' => '默认值',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('your_setting', array(
    'label' => '设置名称',
    'section' => 'jieja_config', // 或创建新section
    'type' => 'text',
));
```

### 添加新的自定义文章类型

在 `functions.php` 中添加：
```php
function jiejiawang_register_your_post_type() {
    register_post_type('your_type', array(
        'labels' => array(
            'name' => '类型名称',
            // ...
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'excerpt'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'jiejiawang_register_your_post_type');
```

### 修改导航链接

编辑 `header.php` 中的导航链接逻辑。

### 修改首页布局

编辑 `front-page.php` 文件。

---

## 许可证

MIT License

## 作者

由AI助手协助开发

## 支持

如有问题，请联系：153-9295-6537

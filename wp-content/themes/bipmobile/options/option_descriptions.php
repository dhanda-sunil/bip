<?php
$shortname = & self::cfg('shortname');
$option_descriptions = array(
	$shortname . '_sidebars_show_demo_data' => array(
		'title' => __('Show Demo Data in Sidebars', BIP_DOMAIN),
		'desc' => __('Show or not demo data in sidebars if there were no widgets added', BIP_DOMAIN),
	),
	$shortname . '_index_sidebars' => array(
		'title' => __('Sidebars on index page', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on index page. Every sidebar has the name same as its color. So there are folowing sidebars: Cyan, Green, Blue, Orange, Red', BIP_DOMAIN),
	),
	$shortname . '_single_page_sidebars' => array(
		'title' => __('Sidebars on single page', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on a single page.', BIP_DOMAIN),
	),
	$shortname . '_single_post_sidebars' => array(
		'title' => __('Sidebars on single post', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on a single post page.', BIP_DOMAIN),
	),
	$shortname . '_category_sidebars' => array(
		'title' => __('Sidebars on category pages', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on a category page.', BIP_DOMAIN),
	),
	$shortname . '_tag_sidebars' => array(
		'title' => __('Sidebars on tag pages', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on a tag page', BIP_DOMAIN),
	),
	$shortname . '_archive_sidebars' => array(
		'title' => __('Sidebars on archive pages', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on an archive page', BIP_DOMAIN),
	),
	$shortname . '_search_sidebars' => array(
		'title' => __('Sidebars on search results pages', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on a search results page', BIP_DOMAIN),
	),
	$shortname . '_404_sidebars' => array(
		'title' => __('Sidebars on "Error 404 - Not Found" pages', BIP_DOMAIN),
		'desc' => __('Select what sidebars must be displayed on an error page', BIP_DOMAIN),
	),
	$shortname . '_other_sidebars' => array(
		'title' => __('Sidebars on other pages', BIP_DOMAIN),
		'desc' => __('This layout will be applied for all other pages not listed in options above. E.g. this layout will be applied to custom taxonomy pages', BIP_DOMAIN),
	),
	$shortname . '_page_width' => array(
		'title' => __('Whole Page Width', BIP_DOMAIN),
		'desc' => __('The Width of the entire page including sidebars. Enter a number and select a unit of measure.', BIP_DOMAIN),
	),
	$shortname . '_blue_sidebar_width' => array(
		'title' => __('Blue Sidebar Width', BIP_DOMAIN),
		'desc' => __('Width of the Blue sidebar and its unit of measure', BIP_DOMAIN),
	),
	$shortname . '_cyan_sidebar_width' => array(
		'title' => __('Cyan Sidebar Width', BIP_DOMAIN),
		'desc' => __('Width of the Cyan sidebar and its unit of measure', BIP_DOMAIN),
	),
	$shortname . '_green_sidebar_width' => array(
		'title' => __('Green Sidebar Width', BIP_DOMAIN),
		'desc' => __('Width of the Green sidebar and its unit of measure', BIP_DOMAIN),
	),
	$shortname . '_orange_sidebar_width' => array(
		'title' => __('Orange Sidebar Width', BIP_DOMAIN),
		'desc' => __('Width of the Orange sidebar and its unit of measure.<br/>Please note that if you selected 4-sidebar layout the width will override the widths of cyan and green sidebars.', BIP_DOMAIN),
	),
	$shortname . '_sidebar_font' => array(
		'title' => __('Sidebar Font', BIP_DOMAIN),
		'desc' => __('The font of common text in the sidebars', BIP_DOMAIN),
	),
	$shortname . '_sidebar_link_color' => array(
		'title' => __('Sidebar Link Color', BIP_DOMAIN),
		'desc' => __('Color of links in the sidebars: regular and hovered', BIP_DOMAIN),
	),
	$shortname . '_blogroll_link_description_color' => array(
		'title' => __('Blogroll Link Description Color', BIP_DOMAIN),
		'desc' => __('Color of link\'s descriptions in a Blogroll widget', BIP_DOMAIN),
	),
	$shortname . '_column_divider' => array(
		'title' => __('Column Divider', BIP_DOMAIN),
		'desc' => __('Define whether to show column (sidebars) divider or not. Selecting "yes" will separate sidebars and main content', BIP_DOMAIN),
	),
	$shortname . '_sidebar_headings_font' => array(
		'title' => __('Sidebar Headings Font', BIP_DOMAIN),
		'desc' => __('The font of headings in the sidebars', BIP_DOMAIN),
	),
	$shortname . '_calendar_widget_font' => array(
		'title' => __('Calendar Widget Font', BIP_DOMAIN),
		'desc' => __('The font of text in a Calendar Widget', BIP_DOMAIN),
	),
	$shortname . '_calendar_th_color' => array(
		'title' => __('Calendar Days of Week color', BIP_DOMAIN),
		'desc' => __('The color of Day of Week in Calendar Widget: text color and background color', BIP_DOMAIN),
	),
	$shortname . '_calendar_today' => array(
		'title' => __('Calendar Today Highlighting', BIP_DOMAIN),
		'desc' => __('Background color of current date and its border style and color in a Calendar Widget', BIP_DOMAIN),
	),
	$shortname . '_footer_show_demo_data' => array(
		'title' => __('Show Demo Data in the Footer', BIP_DOMAIN),
		'desc' => __('Show or not demo data in footer columns if there were no widgets added', BIP_DOMAIN),
	),
	$shortname . '_footers' => array(
		'title' => __('Columns in The Footer', BIP_DOMAIN),
		'desc' => __('Every column in the footer is a widget area. Their names are Blue, Green, Orange and Red Footer. You can add widgets on Appearance -> Widgets page', BIP_DOMAIN),
	),
	$shortname . '_footer_equal_columns' => array(
		'title' => __('Equal Footer Columns', BIP_DOMAIN),
		'desc' => __('Note that if you select YES, the followng options do not affect the appearance', BIP_DOMAIN),
	),
	$shortname . '_blue_footer_column_width' => array(
		'title' => __('Blue Footer Column Width', BIP_DOMAIN),
		'desc' => __('Enter a number and select a unit of measure', BIP_DOMAIN),
	),
	$shortname . '_green_footer_column_width' => array(
		'title' => __('Green Footer Column Width', BIP_DOMAIN),
		'desc' => __('Enter a number and select a unit of measure', BIP_DOMAIN),
	),
	$shortname . '_orange_footer_column_width' => array(
		'title' => __('Orange Footer Column Width', BIP_DOMAIN),
		'desc' => __('Enter a number and select a unit of measure', BIP_DOMAIN),
	),
	$shortname . '_red_footer_column_width' => array(
		'title' => __('Red Footer Column Width', BIP_DOMAIN),
		'desc' => __('Enter a number and select a unit of measure', BIP_DOMAIN),
	),
	$shortname . '_footer_background_color' => array(
		'title' => __('Footer Background Color', BIP_DOMAIN),
		'desc' => __('Background color of the footer', BIP_DOMAIN),
	),
	$shortname . '_text_font' => array(
		'title' => __('Text Font', BIP_DOMAIN),
		'desc' => __('The general font of the site text', BIP_DOMAIN),
	),
	$shortname . '_text_color' => array(
		'title' => __('Text Color', BIP_DOMAIN),
		'desc' => __('Body text color', BIP_DOMAIN),
	),
	$shortname . '_body_background_color' => array(
		'title' => __('Body Background Color', BIP_DOMAIN),
		'desc' => __('This is the background color of the entire web page', BIP_DOMAIN),
	),
	$shortname . '_content_background' => array(
		'title' => __('Content Background Color', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_base_color' => array(
		'title' => __('Base Color', BIP_DOMAIN),
		'desc' => __('Base Color of lines like menu and footer borders', BIP_DOMAIN),
	),
	$shortname . '_show_blog_title_and_description' => array(
		'title' => __('Show Blog Title And Description', BIP_DOMAIN),
		'desc' => __('You might want to hide the blog title and description when using full-width header image. Please note that the folowing option "header font size" is still meaningful - in this case it means header height', BIP_DOMAIN),
	),
	$shortname . '_header_font' => array(
		'title' => __('Header Font', BIP_DOMAIN),
		'desc' => __('This font is used to display the blog title', BIP_DOMAIN),
	),
	$shortname . '_header_description_font' => array(
		'title' => __('Header Description Font', BIP_DOMAIN),
		'desc' => __('This font is used to display the blog description under the blog title', BIP_DOMAIN),
	),
	$shortname . '_header_left_paddig' => array(
		'title' => __('Header Title Left Padding', BIP_DOMAIN),
		'desc' => __('If you want to place an image before (to the left of) the blog title, set the value to the width of the image. E.g. if your image width is 100px set the value to 100.', BIP_DOMAIN),
	),
	$shortname . '_header_top_paddig' => array(
		'title' => __('Header Title Top Padding', BIP_DOMAIN),
		'desc' => __('If you want to have more space above the blog title, set a non-zero value.', BIP_DOMAIN),
	),
	$shortname . '_custom_blog_title' => array(
		'title' => __('Custom Blog Title', BIP_DOMAIN),
		'desc' => __('This value will override your blog title and description in the header. The main purpose of the option is to let you design your blog title as you like. <b>HTML tags are allowed here. Be carefull with them!</b><br/>Leave the field blank to display standard blog title.<br/>Here is a small demo: <br/><img src="${template_url}/options/img/help/custom_blog_title.png">', BIP_DOMAIN),
	),
	$shortname . '_header_image_size' => array(
		'title' => __('Header Image Size', BIP_DOMAIN),
		'desc' => __('Image of this size should be uploaded at Appearance -> Header. The uploaded image will be displayed in the header as a background image. <br/><br/> <b>Fit header space height to the image height</b><br/>If Fit header space height = NO:<br/><img src="${template_url}/options/img/help/header_image_size_1.png"><br/><br/>If Fit header space height = YES:<br/><img src="${template_url}/options/img/help/header_image_size_2.png">', BIP_DOMAIN),
	),
	$shortname . '_header_background_position_css' => array(
		'title' => __('Header Background Position CSS', BIP_DOMAIN),
		'desc' => __('You can select a header image at Appearance -> Header. The image  will be placed according to this option. The option value will be placed right after "<a href="http://www.w3schools.com/css/pr_background-position.asp">background-position</a>:" in #header css. To place the image to the left of your blog title, set the value to "left bottom".', BIP_DOMAIN),
	),
	$shortname . '_header_background' => array(
		'title' => __('Header Background Color', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_show_top_menu' => array(
		'title' => __('Show Top Menu', BIP_DOMAIN),
		'desc' => __('If you set the option to NO, the top menu will be hidden', BIP_DOMAIN),
	),
	$shortname . '_top_menu_font' => array(
		'title' => __('Top Menu Font', BIP_DOMAIN),
		'desc' => __('The font of top menu', BIP_DOMAIN),
	),
	$shortname . '_top_menu_height' => array(
		'title' => __('Top Menu Height', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_top_menu_text_color' => array(
		'title' => __('Top Menu Font Color', BIP_DOMAIN),
		'desc' => __('Top Menu Text Color: regular and hovered', BIP_DOMAIN),
	),
	$shortname . '_top_menu_borders' => array(
		'title' => __('Top Menu Borders', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_breadcrumbs_show' => array(
		'title' => __('Show Breadcrumbs', BIP_DOMAIN),
		'desc' => __('Select YES to show entire path (categories) to current single post', BIP_DOMAIN),
	),
	$shortname . '_breadcrumbs_font' => array(
		'title' => __('Breadcrumbs Font', BIP_DOMAIN),
		'desc' => __('Breadcrumbs is the navigation path to a current post. Select font to use for this.', BIP_DOMAIN),
	),
	$shortname . '_breadcrumbs_color' => array(
		'title' => __('Breadcrumbs Color', BIP_DOMAIN),
		'desc' => __('Color of Breadcrumbs (navigation path)', BIP_DOMAIN),
	),
	$shortname . '_top_menu_background_color' => array(
		'title' => __('Top Menu Background Color', BIP_DOMAIN),
		'desc' => __('Background color of the top menu', BIP_DOMAIN),
	),
	$shortname . '_top_menu_current_item_color' => array(
		'title' => __('Top Menu Current Item Color', BIP_DOMAIN),
		'desc' => __('Text and Background color of current item of the Top menu', BIP_DOMAIN),
	),
	$shortname . '_top_submenu_font' => array(
		'title' => __('Top Submenu Font', BIP_DOMAIN),
		'desc' => __('The Font of submenu items', BIP_DOMAIN),
	),
	$shortname . '_top_submenu_width' => array(
		'title' => __('Width of Top Menu Submenus', BIP_DOMAIN),
		'desc' => __('Width of the top submenus in pixels', BIP_DOMAIN),
	),
	$shortname . '_h1_font' => array(
		'title' => __('Headings Font', BIP_DOMAIN),
		'desc' => __('Headings font is used to dispalay headings on single post/page (<code>&lt;h1&gt;</code> tag) and on post list pages (<code>&lt;h2&gt;</code> tag)', BIP_DOMAIN),
	),
	$shortname . '_h1_color' => array(
		'title' => __('Headings Color', BIP_DOMAIN),
		'desc' => __('Headings color', BIP_DOMAIN),
	),
	$shortname . '_h1_hover_color' => array(
		'title' => __('Headings Hover Color', BIP_DOMAIN),
		'desc' => __('Hovered headings color', BIP_DOMAIN),
	),
	$shortname . '_h2_font' => array(
		'title' => __('H2 Headings Font', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_h2_color' => array(
		'title' => __('H2 Headings Color', BIP_DOMAIN),
		'desc' => __('H2 Headings Color is used on single post/page (<code>&lt;h2&gt;</code> tag)', BIP_DOMAIN),
	),
	$shortname . '_h3_font' => array(
		'title' => __('H3 Headings Font', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_h3_color' => array(
		'title' => __('H3 Headings Color', BIP_DOMAIN),
		'desc' => __('H3 Headings Color is used on single post/page (<code>&lt;h3&gt;</code> tag)', BIP_DOMAIN),
	),
	$shortname . '_h4_font' => array(
		'title' => __('H4 Headings Font', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_h4_color' => array(
		'title' => __('H4 Headings Color', BIP_DOMAIN),
		'desc' => __('H4 Headings Color is used on single post/page (<code>&lt;h4&gt;</code> tag)', BIP_DOMAIN),
	),
	$shortname . '_show_post_info' => array(
		'title' => __('Show Post Info', BIP_DOMAIN),
		'desc' => __('Show or not date, author and categories under post title', BIP_DOMAIN),
	),
	$shortname . '_post_link' => array(
		'title' => __('Post Link', BIP_DOMAIN),
		'desc' => __('Color and text decoration for regular post links', BIP_DOMAIN),
	),
	$shortname . '_post_link_visited' => array(
		'title' => __('Post Link Visited', BIP_DOMAIN),
		'desc' => __('Color and text decoration for visited post links', BIP_DOMAIN),
	),
	$shortname . '_pre_color' => array(
		'title' => __('Preformatted Text Block Color', BIP_DOMAIN),
		'desc' => __('Border Color and Background Color of the preformatted text (<code>&lt;pre&gt;</code> tag)', BIP_DOMAIN),
	),
	$shortname . '_blockquote_color' => array(
		'title' => __('Blockquote Color', BIP_DOMAIN),
		'desc' => __('Border Color and Background Color of the Blockquote text (<code>&lt;blockquote&gt;</code> tag)', BIP_DOMAIN),
	),
	$shortname . '_show_comments_off' => array(
		'title' => __('Show "Comments off" text', BIP_DOMAIN),
		'desc' => __('Show or not "Comments off" text if comments are closed.', BIP_DOMAIN),
	),
	$shortname . '_dividers_color' => array(
		'title' => __('Dividers color', BIP_DOMAIN),
		'desc' => __('The color affects various kinds of dividers: <code>&lt;hr&gt;</code> tag, post info panels top border, comments borders etc.', BIP_DOMAIN),
	),
	$shortname . '_show_post_author' => array(
		'title' => __('Show post\'s author', BIP_DOMAIN),
		'desc' => __('Show or not post\'s author', BIP_DOMAIN),
	),
	$shortname . '_table_font' => array(
		'title' => __('Table Font', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_show_allowed_tags_below_comment_box' => array(
		'title' => __('Show Allowed Tags Below Comment Box', BIP_DOMAIN),
		'desc' => __('Show or not tags (like <code>&lt;a href="" title=""&gt;</code>) allowed in comments', BIP_DOMAIN),
	),
	$shortname . '_comments_avatar_size' => array(
		'title' => __('Avatar size in comments', BIP_DOMAIN),
		'desc' => __('Avatar size in comments (in pixels)', BIP_DOMAIN),
	),
	$shortname . '_comments_metadata_font' => array(
		'title' => __('Comments Metadata Font', BIP_DOMAIN),
		'desc' => __('The font that will be used to display comment\'s author, date and action links', BIP_DOMAIN),
	),
	$shortname . '_comment_metadata_color' => array(
		'title' => __('Comment metadata color', BIP_DOMAIN),
		'desc' => __('Color of permanent links to comments and "edit" links color', BIP_DOMAIN),
	),
	$shortname . '_comment_border' => array(
		'title' => __('Top level comment border', BIP_DOMAIN),
		'desc' => __('Define whether show border for the top level comment or not. Set its color', BIP_DOMAIN),
	),
	$shortname . '_commentator_font' => array(
		'title' => __('Commenter Font', BIP_DOMAIN),
		'desc' => __('The font that will be used to display comment\'s author.', BIP_DOMAIN),
	),
	$shortname . '_commentator_link_color' => array(
		'title' => __('Color of links to commenter websites', BIP_DOMAIN),
		'desc' => __('Regular and hovered colors of link to website of the comment author', BIP_DOMAIN),
	),
	$shortname . '_post_author_link_color' => array(
		'title' => __('Post Author Link Color', BIP_DOMAIN),
		'desc' => __('Color of link to the website of the post author', BIP_DOMAIN),
	),
	$shortname . '_post_author_comment_color' => array(
		'title' => __('Color of Comments by the Post Author', BIP_DOMAIN),
		'desc' => __('You can set a bright color to make post author comments more noticeable', BIP_DOMAIN),
	),
	$shortname . '_comment_author_background' => array(
		'title' => __('Background Color of comment author and metadata bar', BIP_DOMAIN),
		'desc' => __('Background Color of comment author and metadata bar', BIP_DOMAIN),
	),
	$shortname . '_comment_reply_link_color' => array(
		'title' => __('Color of reply link', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_comment_reply_background' => array(
		'title' => __('Background Color of comment reply link', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_comment_reply_border' => array(
		'title' => __('Border Color of comment reply link', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_image_border' => array(
		'title' => __('Image Border', BIP_DOMAIN),
		'desc' => __('Border color and corner radius for images in posts when using captions or <code>wp-caption</code> class', BIP_DOMAIN),
	),
	$shortname . '_image_caption_font' => array(
		'title' => __('Image Caption Font', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_image_caption_text_color' => array(
		'title' => __('Image Caption Text Color', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_pagination_page_box' => array(
		'title' => __('Page Box', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_pagination_current_page_box' => array(
		'title' => __('Current Page Box', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_pagination_page_box_hover' => array(
		'title' => __('Page Box Hovered', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_pagination_inactive_button' => array(
		'title' => __('Pageination Inactive Button', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_seo_use_plugin' => array(
		'title' => __('Use 3rd Party Plugin', BIP_DOMAIN),
		'desc' => __('Set the option to "Yes" if you use 3rd party SEO plugins like <a href="http://wordpress.org/extend/plugins/all-in-one-seo-pack/">All in One SEO Pack</a> plugin. Note that if you select "Yes" the below options will not work.<br/>Also if "Use 3rd Party SEO Plugin" is set to "Yes" The Bip Mobile doesn\'t output at all:
<pre>   &lt;title>
   &lt;meta name="description">
   &lt;meta name="keywords"></pre>
All these tags are supposed to be outputted by a 3rd party SEO plugin. So if you don\'t configure the plugin, the title and meta tags are empty.', BIP_DOMAIN),
	),
	$shortname . '_seo_home_title' => array(
		'title' => __('Home Title', BIP_DOMAIN),
		'desc' => __('This text will be placed into <code>&lt;title&gt;</code> tag', BIP_DOMAIN),
	),
	$shortname . '_seo_home_description' => array(
		'title' => __('Home Description', BIP_DOMAIN),
		'desc' => __('This text will be placed into <code>&lt;meta name="description"&gt;</code> tag', BIP_DOMAIN),
	),
	$shortname . '_seo_home_keywords' => array(
		'title' => __('Home Keywords', BIP_DOMAIN),
		'desc' => __('This text will be placed into <code>&lt;meta name="keywords"&gt;</code> tag', BIP_DOMAIN),
	),
	$shortname . '_seo_post_title_format' => array(
		'title' => __('Post Title Format', BIP_DOMAIN),
		'desc' => __('Format of <code>&lt;title&gt;</code> tag on single post page.<br/>Available shortcodes are: %blog_title%, %blog_description%, %category%, %post_title%', BIP_DOMAIN),
	),
	$shortname . '_seo_page_title_format' => array(
		'title' => __('Page Title Format', BIP_DOMAIN),
		'desc' => __('Format of <code>&lt;title&gt;</code> tag on single page.<br/>Available shortcodes are: %blog_title%, %blog_description%, %page_title%', BIP_DOMAIN),
	),
	$shortname . '_seo_category_title_format' => array(
		'title' => __('Category Title Format', BIP_DOMAIN),
		'desc' => __('Format of <code>&lt;title&gt;</code> tag on category page.<br/>Available shortcodes are: %blog_title%, %blog_description%, %category%, %category_description%', BIP_DOMAIN),
	),
	$shortname . '_seo_tag_title_format' => array(
		'title' => __('Tag Title Format', BIP_DOMAIN),
		'desc' => __('Format of <code>&lt;title&gt;</code> tag on tag page.<br/>Available shortcodes are: %blog_title%, %blog_description%, %tag%', BIP_DOMAIN),
	),
	$shortname . '_post_list_column_count' => array(
		'title' => __('Column Count', BIP_DOMAIN),
		'desc' => __('Column count of posts on index page. Set it to 0 or 1 to show common post list', BIP_DOMAIN),
	),
	$shortname . '_post_list_column_rows' => array(
		'title' => __('Column Rows', BIP_DOMAIN),
		'desc' => __('Rows count of columnar posts on index page.', BIP_DOMAIN),
	),
	$shortname . '_show_category_in_column' => array(
		'title' => __('Show in columns post from this category', BIP_DOMAIN),
		'desc' => __('If you want to dispalay in columns only posts from one category (e.g. featured posts) select the category here', BIP_DOMAIN),
	),
	$shortname . '_show_latest_post_before_columns' => array(
		'title' => __('Show Latest Post Before Columns', BIP_DOMAIN),
		'desc' => __('Whether show the latest post before columnar posts or after them.', BIP_DOMAIN),
	),
	$shortname . '_normal_thumbnail_size' => array(
		'title' => __('Normal Thumbnail Size', BIP_DOMAIN),
		'desc' => __('Width and height of post thumbnail images in pixels. They are visible in post lists like index page, category pages etc.<br/><b>Important</b>: Due to WordPress peculiarity you should regenerate <b>all</b> thumbnails on the theme install and on every change of these values.<br/><b>Tip</b>: you can use plugins like <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/">Regenerate Thumbnails</a> and <a href="http://wordpress.org/extend/plugins/ajax-thumbnail-rebuild/">AJAX Thumbnail Rebuild</a> to regenerate thumbnails', BIP_DOMAIN),
	),
	$shortname . '_column_thumbnail_size' => array(
		'title' => __('Column Thumbnail Size', BIP_DOMAIN),
		'desc' => __('Width and height (in pixels) of post thumbnail images displayed in columns on the index page. See "Normal Thumbnail Size" option help for details.<br/>Please note that the width correlates with the "Show Thumbnail Border" option and column width on index page (calculated depending on page width, sidepar widths and column count). So first you should set those options, then see column width. Afterwards set this option. If you selected to Show Thumbnail Border you should decrease column width by 10', BIP_DOMAIN),
	),
	$shortname . '_thumbnail_show_border' => array(
		'title' => __('Show Thumbnail Border', BIP_DOMAIN),
		'desc' => __('Whether show border around thumbnails or not', BIP_DOMAIN),
	),
	$shortname . '_regular_post_thumbnail_position' => array(
		'title' => __('Thumbnail Position in Regular Posts', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_show_excerpts_on' => array(
		'title' => __('Show excerpts on', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_excerpt_length' => array(
		'title' => __('Excerpts Length', BIP_DOMAIN),
		'desc' => __('Excerpts Length', BIP_DOMAIN),
	),
	$shortname . '_excerpt_more_link' => array(
		'title' => __('Show "More" link for excerpts', BIP_DOMAIN),
		'desc' => __('This option defines whether show "more" link or not when showing post excerpts', BIP_DOMAIN),
	),
	$shortname . '_show_content_if_no_excerpt' => array(
		'title' => __('Show Content if no excerpt was provided', BIP_DOMAIN),
		'desc' => __('The option defines what to display if <b>Show Post Excerpts</b> is set to "Yes" but no excerpt is provided for a post:<br/>- if "No": generate excerpt from the post content. If a thumbnail is set for the post, it will be displayed;<br/>- if "Yes": show content of the post. You can use &lt;!--more--&gt; tag to shorten oputput.<br/><br/>Please note that <b>columnar posts are always displayed as excerpts</b> regardless of the option value.<br/>', BIP_DOMAIN),
	),
	$shortname . '_show_column_post_info' => array(
		'title' => __('Show Post Info in Columns', BIP_DOMAIN),
		'desc' => __('Whether show post date and categories of columnar posts', BIP_DOMAIN),
	),
	$shortname . '_social_buttons_theme' => array(
		'title' => __('Social Buttons Theme', BIP_DOMAIN),
		'desc' => __('You can add your own themes in three quite simple steps:<br/>1. Upload your images of the buttons to /clear-line/img/social/&lt;<i>new_theme_folder</i>&gt;/
Please note that the names of the files must be the same as those in the folder "grey"<br/>
2. open file /options/value_set.php and add the line marked red here: <pre>\'SOCIAL_\' => array(
	\'values\'=>array(
		\'green-jelly-icons\' =>__(\'Green jelly\',BIP_DOMAIN),
		\'grey\'			=>__(\'Grey\',BIP_DOMAIN),
		<font style="color:red">\'new_theme_folder\'	=>__(\'Your theme name\',BIP_DOMAIN),</font>
	),</pre>
3. Save and upload to your hosting<br/>
(4). Send me images and theme name, I\'ll include the theme to the next release', BIP_DOMAIN),
	),
	$shortname . '_sharing_buttons_on_blue_sidebar' => array(
		'title' => __('Sharing Buttons on Blue Sidebar', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_sharing_buttons_on_orange_sidebar' => array(
		'title' => __('Sharing Buttons on Orange Sidebar', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_sharing_buttons_on_green_sidebar' => array(
		'title' => __('Sharing Buttons on Green Sidebar', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_show_rss_button_at_top' => array(
		'title' => __('Show RSS Button at top of the page', BIP_DOMAIN),
		'desc' => __('', BIP_DOMAIN),
	),
	$shortname . '_bitly_login' => array(
		'title' 		=> __('Bit.ly Login', BIP_DOMAIN),
		'desc'			=> __('Login at shortening service site <a href="http://bit.ly">bit.ly</a>', BIP_DOMAIN),
	),
	$shortname . '_bitly_api_key' => array(
		'title' 		=> __('Bit.ly API Key', BIP_DOMAIN),
		'desc'			=> __('You can get your API Key in your <a href="https://bitly.com/a/account">bit.ly account</a> (you should to log in)', BIP_DOMAIN),
	),
);
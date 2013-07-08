<?php get_header();?>
<?php  
    $bip_templates = array(
        'templates/portfolio.php',
        'templates/slider.php',
        'templates/tariffs.php',
        'templates/contact.php',
        'templates/shop.php',
		'templates/shops.php',
        'templates/connect.php',
        'templates/products.php',
        'templates/copertura.php',
        'templates/configuration.php'
    );
	$stylesheet_directory 	= get_stylesheet_directory();
	$template_directory		= get_template_directory();
?>
<?php if ( have_posts() ) :?>
    <?php while (have_posts()) : the_post(); ?>
    <?php $template = get_page_template_slug( get_queried_object_id() ); ?>
    <?php if (empty($template)) : ?>
    <div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div class="container">
            <div class="page-title">
                <a href="#<?php echo esc_attr(basename(get_permalink())); ?>"><h1><?php the_title(); ?></h1></a>
            </div>
            <?php the_content(); ?>
        </div>
    </div>
    <?php elseif (in_array($template, $bip_templates)) : ?>
    <?php
        if ( file_exists($stylesheet_directory . '/' . $template)) {
        	$located = $stylesheet_directory . '/' . $template;
        } else if ( file_exists($template_directory . '/' . $template) ) {
            $located = $template_directory . '/' . $template;
        }
        if (isset($located)) {
            load_template($located);
        }
    ?>
    <?php endif; ?>
    <?php endwhile; ?>
<?php elseif (BipCore::shopSearch()!='') :
		$s		= BipCore::shopSearch();
		$shops	= array();
		if($shop!='list'){
			if(is_numeric($s)){
				$shops	= json_decode(file_get_contents('http://store.bip.it/getDealers.php?cap='.$s));
			}else{
				$shops	= json_decode(file_get_contents('http://store.bip.it/getDealers.php?provincia='.$s));
			}
		}
		include(WPTHEME_PATH . '/templates/shops-list.php');
	
	elseif (is_search() || BipCore::isSearch()!='') :
		load_template(WPTHEME_PATH . '/search.php');
	
	elseif (BipCore::isAdministratorUserLoggedIn()) : ?>
    <div>
        <div class="container">
            <div class="span12">
                <p class="alert clearfix">
                    <?php printf(__('No pages to display. You can manage the pages <a href="%s">here</a>.', BIP_DOMAIN), admin_url('edit.php?post_type=page')); ?>
                    <br />
                    <em class="pull-right"><small><?php esc_html_e('This tip is visible only for site administrators.', BIP_DOMAIN); ?></small></em>
                </p>
            </div>
        </div>
    </div>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>
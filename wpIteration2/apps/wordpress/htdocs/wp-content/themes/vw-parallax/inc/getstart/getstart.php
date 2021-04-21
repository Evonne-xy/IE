<?php
//about theme info
add_action( 'admin_menu', 'vw_parallax_gettingstarted' );
function vw_parallax_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Parallax', 'vw-parallax'), esc_html__('About VW Parallax', 'vw-parallax'), 'edit_theme_options', 'vw_parallax_guide', 'vw_parallax_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_parallax_admin_theme_style() {
   wp_enqueue_style('vw-parallax-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-parallax-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
   wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vw_parallax_admin_theme_style');

//guidline for about theme
function vw_parallax_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-parallax' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Parallax Theme', 'vw-parallax' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-parallax'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Parallax at 20% Discount','vw-parallax'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-parallax'); ?> ( <span><?php esc_html_e('vwpro20','vw-parallax'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_PARALLAX_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-parallax' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_parallax_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-parallax' ); ?></button>
			<button class="tablinks" onclick="vw_parallax_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-parallax' ); ?></button>
		  	<button class="tablinks" onclick="vw_parallax_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-parallax' ); ?></button>		 
		  	<button class="tablinks" onclick="vw_parallax_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-parallax' ); ?></button>
		  	<button class="tablinks" onclick="vw_parallax_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-parallax' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_parallax_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_parallax_plugin_custom_css ='display: block';
			}
		?>
		<div id="gutenberg_editor" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Parallax_Plugin_Activation_Settings::get_instance();
			$vw_parallax_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-parallax-recommended-plugins">
				    <div class="vw-parallax-action-list">
				        <?php if ($vw_parallax_actions): foreach ($vw_parallax_actions as $key => $vw_parallax_actionValue): ?>
				                <div class="vw-parallax-action" id="<?php echo esc_attr($vw_parallax_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_parallax_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_parallax_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_parallax_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-parallax' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-parallax-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-parallax'); ?></a>
			    </div>
			<?php } ?>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Parallax_Plugin_Activation_Settings::get_instance();
			$vw_parallax_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-parallax-recommended-plugins">
				    <div class="vw-parallax-action-list">
				        <?php if ($vw_parallax_actions): foreach ($vw_parallax_actions as $key => $vw_parallax_actionValue): ?>
				                <div class="vw-parallax-action" id="<?php echo esc_attr($vw_parallax_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_parallax_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_parallax_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_parallax_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-parallax'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_parallax_plugin_custom_css); ?>">
			  	<h3><?php esc_html_e( 'Block Patterns', 'vw-parallax' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-parallax'); ?></p>
              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-parallax'); ?></span></b></p>
              	<div class="vw-parallax-pattern-page">
			    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-parallax'); ?></a>
			    </div>
              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />				
	        </div>
		</div>

		<div id="lite_theme" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Parallax_Plugin_Activation_Settings::get_instance();
				$vw_parallax_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-parallax-recommended-plugins">
				    <div class="vw-parallax-action-list">
				        <?php if ($vw_parallax_actions): foreach ($vw_parallax_actions as $key => $vw_parallax_actionValue): ?>
				                <div class="vw-parallax-action" id="<?php echo esc_attr($vw_parallax_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_parallax_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_parallax_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_parallax_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-parallax'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_parallax_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-parallax' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Parallax is a gorgeous, feature-rich, versatile and multipurpose WordPress theme with stunning parallax effects to give a whole new dimension to your website. As it is a dynamic theme it can be used for businesses, corporates, online shops, eCommerce websites, blogs, portfolios, agencies and all types of businesses. The theme is a perfect fit for all range of businesses from small to medium and large to give them the desired professional look along with keeping them in the race of being modern. This parallax WordPress theme is fully responsive with fluid layout and loads on all browsers. It supports RTL writing and can be translated into several other languages. Its full width slider is welcoming with properly placed call to action (CTA) buttons to lead visitors. Its full customization makes it even more resourceful with facility to make changes through theme customizer in just a few clicks makes it all the more handy. Though it is full of features, it does not bloat and loads smoothly. It has social media icons embedded making content easily shareable.','vw-parallax'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-parallax' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-parallax' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PARALLAX_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-parallax' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-parallax'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-parallax'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-parallax'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-parallax'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-parallax'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PARALLAX_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-parallax'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-parallax'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-parallax'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PARALLAX_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-parallax'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-parallax' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-parallax'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-parallax'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-parallax'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_about_section') ); ?>" target="_blank"><?php esc_html_e('About Us Section','vw-parallax'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-tide"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_service_section') ); ?>" target="_blank"><?php esc_html_e('Service Section','vw-parallax'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-parallax'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-parallax'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-parallax'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-parallax'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_parallax_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-parallax'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-parallax'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-parallax'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-parallax'); ?></span><?php esc_html_e(' Go to ','vw-parallax'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-parallax'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-parallax'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-parallax'); ?></span><?php esc_html_e(' Go to ','vw-parallax'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-parallax'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-parallax'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-parallax'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-parallax/" target="_blank"><?php esc_html_e('Documentation','vw-parallax'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-parallax' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This parallax WordPress theme is engaging, stylish, versatile and extremely modern to suit all types of websites be it business, corporate, entertainment, sports, news and magazine, digital agency, online shop, portfolio, blog or any other sort. It is extremely user-friendly and easy to use so much so that a person with no coding background can design his website effortlessly within a short time. Its understandable backend and thoroughly explained documentation make even a WordPress newbie self-sufficient to set up a fully functional website in just a few clicks. This parallax WP theme is pixel perfect showing sharp images and crisp fonts to give great look on HD devices. It has clean design with bug-free code to keep website safe from malicious things. It maintains WordPress standard of coding so you can be assured to get a good theme at such a low price.','vw-parallax'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_PARALLAX_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-parallax'); ?></a>
					<a href="<?php echo esc_url( VW_PARALLAX_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-parallax'); ?></a>
					<a href="<?php echo esc_url( VW_PARALLAX_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-parallax'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-parallax' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-parallax'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-parallax'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-parallax'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-parallax'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-parallax'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-parallax'); ?></td>
								<td class="table-img"><?php esc_html_e('16', 'vw-parallax'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-parallax'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-parallax'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-parallax'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-parallax'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-parallax'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-parallax'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-parallax'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_PARALLAX_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-parallax'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-parallax'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-parallax'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PARALLAX_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-parallax'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-parallax'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-parallax'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PARALLAX_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-parallax'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-parallax'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-parallax'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PARALLAX_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-parallax'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-parallax'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-parallax'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PARALLAX_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-parallax'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-parallax'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-parallax'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PARALLAX_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-parallax'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?> 
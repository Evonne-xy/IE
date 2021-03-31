<?php
/**
 * The template part for topbar
 *
 * @package VW Parallax 
 * @subpackage vw_parallax
 * @since VW Parallax 1.0
 */
?>
<?php if( get_theme_mod( 'vw_parallax_topbar_hide_show', false) != '' || get_theme_mod( 'vw_parallax_resp_topbar_hide_show', false) != '') { ?>
    <div class="row m-0">
        <div id="topbar" class="col-md-12 col-lg-9 offset-lg-3">
        	<div class="row">
            	<div class="col-lg-2 col-md-6">
            		<?php if(get_theme_mod('vw_parallax_phone') != ''){ ?>
                        <i class="<?php echo esc_attr(get_theme_mod('vw_parallax_phone_icon','fas fa-phone')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_parallax_phone',''));?></span>
                    <?php }?>
        	    </div>
            	<div class="col-lg-3 col-md-6">
            		<?php if(get_theme_mod('vw_parallax_email_address') != ''){ ?>
            			<i class="<?php echo esc_attr(get_theme_mod('vw_parallax_email_icon','fas fa-envelope-open')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_parallax_email_address',''));?></span>
            		<?php }?>
            	</div>
            	<div class="col-lg-4 col-md-6">
                    <?php if(get_theme_mod('vw_parallax_timming') != ''){ ?>
                        <i class="<?php echo esc_attr(get_theme_mod('vw_parallax_timing_icon','far fa-clock')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_parallax_timming',''));?></span>
                    <?php }?>
            	</div>
                <div class="col-lg-3 col-md-6">
                    <?php dynamic_sidebar('social-widget'); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_parallax_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_parallax_slider_hide_show', false) != '' || get_theme_mod( 'vw_parallax_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'vw_parallax_slider_speed',3000)) ?>"> 
        <?php $vw_parallax_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_parallax_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_parallax_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_parallax_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_parallax_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_parallax_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_parallax_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_parallax_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_parallax_slider_button_text',__('READ MORE','vw-parallax')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_parallax_slider_button_text',__('READ MORE','vw-parallax')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-parallax' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-parallax' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'vw_parallax_after_slider' ); ?>

  <?php if(get_theme_mod('vw_parallax_services') != ''){ ?>
    <section id="service-sec">
      <div class="container">
        <div class="row">
          <?php
            $vw_parallax_catData =  get_theme_mod('vw_parallax_services','');
              if($vw_parallax_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($vw_parallax_catData,'vw-parallax'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-4 col-md-4 category_main">
                <div class="catgory-box">
                  <?php the_post_thumbnail(); ?>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                  <hr>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_parallax_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_parallax_services_excerpt_number','30')))); ?></p>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>  
    </section>
  <?php }?>

  <section id="about">
    <div class="container">
      <?php $vw_parallax_about_pages = array();
        $mod = absint( get_theme_mod( 'vw_parallax_about_page' ));
        if ( 'page-none-selected' != $mod ) {
          $vw_parallax_about_pages[] = $mod;
        }
        if( !empty($vw_parallax_about_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_parallax_about_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="row">
                <div class="col-lg-8 col-md-8">
                  <?php if(get_theme_mod('vw_parallax_section_main_title') != ''){ ?>
                    <h3><?php echo esc_html(get_theme_mod('vw_parallax_section_main_title',''));?></h3>
                  <?php }?>
                  <h4><?php the_title(); ?></h4>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_parallax_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_parallax_about_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_parallax_about_button_text','CONTINUE READING') != ''){ ?>
                    <div class="about-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_parallax_about_button_text',__('CONTINUE READING','vw-parallax')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_parallax_about_button_text',__('CONTINUE READING','vw-parallax')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4">
                  <?php the_post_thumbnail(); ?>
                </div>
              </div>
            <?php endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif; wp_reset_postdata() ?>
      <div class="clearfix"></div> 
    </div>
  </section>

  <?php do_action( 'vw_parallax_after_about' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
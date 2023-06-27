<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('nutrition_diet_slider_arrows') == '1'){ ?>
    <section id="slider">
      <span class="design-right"></span>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $nutrition_diet_mod =  get_theme_mod( 'nutrition_diet_post_setting' . $i );
            if ( 'page-none-selected' != $nutrition_diet_mod ) {
              $nutrition_diet_slide_post[] = $nutrition_diet_mod;
            }
          }
           if( !empty($nutrition_diet_slide_post) ) :
          $nutrition_diet_args = array(
            'post_type' =>array('post'),
            'post__in' => $nutrition_diet_slide_post
          );
          $nutrition_diet_query = new WP_Query( $nutrition_diet_args );
          if ( $nutrition_diet_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $nutrition_diet_query->have_posts() ) : $nutrition_diet_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="carousel-caption slider-inner">
              <?php if( get_theme_mod('nutrition_diet_extra_text') != '' ){ ?>
                <h6><i class="fas fa-star mr-2"></i><?php echo esc_html(get_theme_mod('nutrition_diet_extra_text','')); ?></h6>
              <?php }?>
              <h2 class="slider-title"><?php the_title();?></h2>
              <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'20') );?></p>
              <div class="home-btn my-4">
                <a href="<?php the_permalink(); ?>"><i class="fas fa-plus mr-3"></i><?php echo esc_html('Book Your Free Slot','nutrition-diet'); ?></a>
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
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php if( get_option('nutrition_diet_about_enable',true) != 'off'){ ?>
    <section id="about-us" class="py-5 text-center text-md-left">
      <div class="container">
        <div class="row">
          <?php
            $nutrition_diet_mod = get_theme_mod( 'nutrition_diet_middle_sec_page_settigs' );
            if ( 'page-none-selected' != $nutrition_diet_mod ) {
              $nutrition_diet_page[] = $nutrition_diet_mod;
            }
            if( !empty($nutrition_diet_page) ) :
            $nutrition_diet_args = array(
              'post_type' =>'page',
              'post__in' => $nutrition_diet_page
            );
            $nutrition_diet_query = new WP_Query( $nutrition_diet_args );
            if ( $nutrition_diet_query->have_posts() ) :
          ?>
          <?php  while ( $nutrition_diet_query->have_posts() ) : $nutrition_diet_query->the_post(); ?>
            <div class="col-lg-5 col-md-5 col-sm-5">
              <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
              <div class="calling-box text-center">
                <?php if( get_theme_mod('nutrition_diet_calling_text') != '' ){ ?>
                  <p><?php echo esc_html( get_theme_mod('nutrition_diet_calling_text')); ?></p>
                <?php }?>
                <?php if( get_theme_mod('nutrition_diet_calling_number') != '' ){ ?>
                  <h5><?php echo esc_html( get_theme_mod('nutrition_diet_calling_number')); ?></h5>
                <?php }?>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
              <div class="middle-sec-box pt-md-0 pt-5 pt-lg-5">
                <?php if( get_theme_mod('nutrition_diet_about_title') != '' ){ ?>
                  <h6><?php echo esc_html( get_theme_mod('nutrition_diet_about_title')); ?></h6>
                <?php }?>
                <h3><?php the_title();?></h3>
                <p><?php echo esc_html(wp_trim_words(get_the_content(),'80') );?></p>
                <a href="<?php the_permalink(); ?>" class="abt-button-1"><?php esc_html_e('Know More','nutrition-diet'); ?></a>
                <?php if( get_theme_mod('nutrition_diet_about_button_2_link') != '' || get_theme_mod('nutrition_diet_about_button_2_text') != '' ){ ?>
                  <a href="<?php echo esc_url( get_theme_mod('nutrition_diet_about_button_2_link')); ?>" class="abt-button-2"><?php echo esc_html( get_theme_mod('nutrition_diet_about_button_2_text')); ?></a>
                <?php }?>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();?>
          <?php else : ?>
          <div class="no-postfound"></div>
            <?php endif;
          endif;?>
        </div>
      </div>
    </section>
  <?php } ?>
</main>

<?php get_footer(); ?>

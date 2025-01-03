<?php
/**
 * This file adds the Home Page to the Parallax Pro Theme.
 *
 * @author StudioPress
 * @package Parallax
 * @subpackage Customizations
 */


//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Add parallax-home body class
add_filter( 'body_class', 'parallax_body_class' );
function parallax_body_class( $classes ) {

	$classes[] = 'home';
	return $classes;
	
}
 
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'custom_homepage' );
 
function custom_homepage() { 
global $blogurl;
?>
<style>
.home .site-inner {
	padding: 0px 0px 0px 0px;
	max-width: 100%;
	margin-top: -39px;
}
.home .content {
	padding: 0px !important; /*margin-top: -199px;*/
}
</style>

<!--Home-Top  ENDS HERE-->

<section id="aboutus">
  <div class="wrap">
    <div class="one-half first info">
      <h2>
        <?php the_field( "main_heading1" ); ?>
      </h2>
      <p>
        <?php the_field( "content1" ); ?>
      </p>
      <a href="<?php the_field('view_more_link'); ?>" class="button">View More &raquo;</a> </div>
    <div class="one-half video-playlist">
      <?php 
					$video1 = get_field("playlist_shortcode"); 
					echo do_shortcode($video1); 
				?>
    </div>
  </div>
</section>

<section id="application">
  <div class="wrap">
    <h2>Noise Applications</h2>
    <div class="one-fifth first"> <a href="/products-appliances/power-water-and-utilities/"><img src="<?php the_field('1upload_image'); ?>" alt="utilities" /></a>
      <h3><a href="javascript:void(0)" class="hint--bottom  hint--info" data-hint="<?php the_field('1tooltip'); ?>">
        <?php the_field('1title'); ?>
        </a></h3>
    </div>
    <div class="one-fifth"> <a href="/products-appliances/roads-and-highways/"><img src="<?php the_field('2upload_image'); ?>" alt="dot and transportation" /></a>
      <h3><a href="javascript:void(0)" class="hint--bottom  hint--info" data-hint="<?php the_field('2tooltip'); ?>">
        <?php the_field('2title'); ?>
        </a></h3>
    </div>
    <div class="one-fifth"> <a href="/products-appliances/oil-gas-ep/"><img src="<?php the_field('3upload_image'); ?>" alt="oil and gas" /></a>
      <h3><a href="javascript:void(0)" class="hint--bottom  hint--info" data-hint="<?php the_field('3tooltip'); ?>">
        <?php the_field('3title'); ?>
        </a></h3>
    </div>
    <div class="one-fifth"> <a href="/products-appliances/ac-and-heating-commercial-hvac/"><img src="<?php the_field('4upload_image'); ?>" alt="commercial hvac" /></a>
      <h3><a href="javascript:void(0)" class="hint--bottom  hint--info" data-hint="<?php the_field('4tooltip'); ?>">
        <?php the_field('4title'); ?>
        </a></h3>
    </div>
    <div class="one-fifth"> <a href="/products-appliances/commercial-development-and-construction-big-box-stores/"><img src="<?php the_field('5upload_image'); ?>" alt="commercial development" /></a>
      <h3><a href="javascript:void(0)" class="hint--bottom  hint--info" data-hint="<?php the_field('5tooltip'); ?>">
        <?php the_field('5title'); ?>
        </a></h3>
    </div>
    <a href="<?php the_field('view_more_link_noise'); ?>" class="button">View More &raquo;</a> </div>
</section>

<section id="product">
  <div class="wrap">
    <h2>Our Products</h2>
	
	<?php if( have_rows('upload_products') ):	?>
	<div class="owl-carousel">
	  <?php while ( have_rows('upload_products') ) : the_row(); ?>
	  
	   <div>
		  <a href="#"><img src="<?php the_sub_field('upload_product_image'); ?>" alt="<?php the_sub_field('product_title'); ?>" /></a>
		  <h3><a href="<?php the_sub_field('apply_link'); ?>"><?php the_sub_field('product_title'); ?></a></h3>
		</div>
		
	  <?php endwhile; ?>
	</div>
	<?php else : endif; ?>
	
     </div>
</section>

<section id="technology">
  <div class="wrap">
    <div class="one-half first single-video" style="margin-top: 10px;">
      <div onclick="thevid=document.getElementById('thevideo'); thevid.style.display='block'; this.style.display='none'; document.getElementById('iframe').src =document.getElementById('iframe').src.replace('autoplay=0','autoplay=1');"> <img style="cursor: pointer;" src="https://www.soundfighter.com/wp-content/uploads/2015/08/youtube-2.jpg" alt="" /> </div>
      <div id="thevideo" style="display: none;">
        <iframe id="iframe"  width="577" height="342" src="https://www.youtube.com/embed/3Mjv6pw2x7I?rel=0&autoplay=0" frameborder="0" allowfullscreen allowscriptaccess="always"></iframe>
      </div>
    </div>
    <div class="one-half tech-info">
      <h2>
        <?php the_field( "main_heading" ); ?>
      </h2>
      <p>
        <?php the_field( "content" ); ?>
      </p>
      <a href="<?php the_field('learn_more_link'); ?>" class="button">Learn More &raquo;</a> </div>
  </div>
</section>

<section id="noise">
  <div class="wrap">
    <div class="one-half first noise-type">
    	<?php the_field('content_section1'); ?>
    </div>
     <div class="one-half noise-type">
     	<?php the_field('content_section2'); ?>
    </div>
  </div>
  
  <div class="wrap" style="margin-top:30px; text-align:center;">
 	<?php the_field('content_section3'); ?>	
  </div>
  
</section>

<section id="latest">
  <div class="wrap">
    <div class="one-half first latest-news">
      <div class="headline">
        <h2>Latest News</h2>
      </div>
      <?php dynamic_sidebar( 'genesis-featured-posts' ); ?>
      <a href="/blog/" class="button" style="margin-top:16px;">View More &raquo;</a> </div>
    <div class="one-half latest-testimonials">
      <div class="headline">
        <h2>Testimonials</h2>
      </div>
      <?php dynamic_sidebar( 'testimonials-home' ); ?>
      <a href="/about/testimonials/" class="button">View More &raquo;</a> </div>
  </div>
</section>
<?php }
 
//* Run the Genesis loop
genesis();


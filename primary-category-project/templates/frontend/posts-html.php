<!-- Blog Section Start -->
  <section id="blog" class="blog global_header">
    <div class="container">
      <div class="row">
        <div class="header_title text-center">          
          <div class="title_content">
            <h2><?php echo $atts['post_type']; ?></h2>
          </div>
        </div>
		
		<?php if($the_query->have_posts()): ?>
		
		
        <div class="blog_slider owl-carousel owl-theme">
		  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?> 
		  
          <div class="slider_box">
            <div class="slider_content">
              <div class="slider_content_box">
			  
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="content_img">
					<?php the_post_thumbnail('thumbnail') ?>
					</div>
				<?php endif ?>                 
                  
                
                <div class="content_box">
                  <h4><?php the_title(); ?></h4>
                  <p><?php the_excerpt(); ?></p>
                </div>
                <div class="content_footer">
                  <div class="footer_date">
                    <span><?php the_date(); ?></span>
                  </div>
                  <div class="footer_btn">
                    <a href="<?php the_permalink(); ?>">Learn More ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  <?php endwhile; ?> 
        </div>
      
		<?php else: ?>
		
			<?php echo 'No posts found with that criteria.'; ?>
			
		<?php endif; ?>
	  
	  </div>
    </div>
  </section>
  <!-- Blog Section End -->
  
   <?php wp_reset_postdata();?> 
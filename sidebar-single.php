<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package universal-example
 */

// if ( ! is_active_sidebar( 'sidebar-single' ) ) {
// 	return;
// }
?>

<aside class="sidebar-single">
	<div class="container">
    <?php dynamic_sidebar( 'sidebar-single' ); ?>
    <?php		
      global $post;
      $category = get_the_category( $id );
      $query = new WP_Query( [
        'posts_per_page' => 4,
        'category-name'        => $category[0] -> slug,
      ] );

      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();          
          ?>
            <div class="sidebar-single-item">
              <a href="<?php the_permalink()?>" class="sidebar-single-item-thumb">
                <img src="
                <?php                  
                  if( has_post_thumbnail() ) {
                    echo get_the_post_thumbnail_url();
                  }
                  else {
                    echo get_template_directory_uri() . '/assets/images/image-default.png';
                  }
                ?>
                " alt="">
              </a>
              <a href="<?php the_permalink()?>" class="sidebar-single-item-title"><? the_title(  ) ?></a>
              <div class="sidebar-single-item-info">
                <div class="views sidebar-single-item-info-views">
                  <svg fill="#BCBFC2" width="15" height="15" class="icon eye-icon">
                    <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#eye"></use>
                  </svg>
                  <span class="likes-counter"><?php comments_number( '0', '1', '%' )?></span>
                </div> 
                <div class="comments sidebar-single-item-info-comments">
                  <svg fill="#BCBFC2" width="15" height="15" class="icon comments-icon">
                    <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#comment"></use>
                  </svg>
                  <span class="comments-counter"><?php comments_number( '0', '1', '%' )?></span>
                </div>                  
              </div>
            </div>
          <?php 
        }
      } else {
        // Постов не найдено
      }

      wp_reset_postdata(); // Сбрасываем $post
    ?>
  </div>
</aside><!-- #secondary -->

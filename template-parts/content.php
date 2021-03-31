<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- шапка поста -->
  <header class="entry-header <?php echo get_post_type()?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75)), url(
    <?php 
      if( has_post_thumbnail() ) {
        echo get_the_post_thumbnail_url();
      }
      else {
        echo get_template_directory_uri() . '/assets/images/img-default.png';
      }
      ?>);">
		<div class="container">     
      <div class="post-header-wrapper">
        <div class="post-header-nav">
          <?php      
          foreach (get_the_category() as $category) {
            printf(
              '<a href="%s" class="category-link %s">%s</a>',
              esc_url( get_category_link( $category ) ), 
              esc_html( $category -> slug ), 
              esc_html( $category -> name )
            );    
          }

          ?>
          <!-- Ссылка на главную -->
          <a class="home-link" href="<?php echo get_home_url()?>">
          <svg fill="#ffffff" width="18" height="17" class="icon comments-icon">
            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#home"></use>
          </svg> 
          На главную
          </a>
          <?php 

          the_post_navigation(
            array(
              'prev_text' => '<span class="post-nav-prev">
              <svg fill="#ffffff" width="15" height="7" class="icon prev-icon">
                <use xlink:href="'.get_template_directory_uri().'/assets/images/sprite.svg#left-arrow"></use>
              </svg>
              ' . esc_html__( 'Назад', 'universal-example' ) . '</span>',
              'next_text' => '<span class="post-nav-next">' . esc_html__( 'Вперед', 'universal-example' ) . '
              <svg fill="#ffffff" width="15" height="7" class="icon next-icon">
                <use xlink:href="'.get_template_directory_uri().'/assets/images/sprite.svg#arrow"></use>
              </svg>
              </span>',
            )
          );
          ?>
        </div>
        <button class="post-bookmark">
          <svg fill="#ffffff" width="30" height="30" class="icon bookmark-icon">
            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#bookmark"></use>
          </svg>
        </button>        
          <?php
            // проверяем, точно ли мы на странице поста
            if ( is_singular() ) :
              the_title( '<h1 class="post-title">', '</h1>' );
            else :
              the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
          ?>      
          <?php the_excerpt() ?>
        <div class="post-header-info">
          <span class="post-date">
            <svg fill="#BCBFC2" width="15" height="15" class="icon comments-icon">
              <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#clock"></use>
            </svg>
            <?php the_time('j F, G:i') ?>
          </span>
          <div class="comments post-comments">
            <svg fill="#BCBFC2" width="15" height="15" class="icon comments-icon">
              <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#comment"></use>
            </svg>
            <span class="comments-counter"><?php comments_number( '0', '1', '%' )?></span>
          </div>
          <div class="likes post-header-likes">
            <svg fill="#BCBFC2" width="15" height="15" class="icon comments-icon">
              <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#heart"></use>
            </svg>
            <span class="likes-counter"><?php comments_number( '0', '1', '%' )?></span>
          </div>   
        </div>
        <div class="post-author">
            <div class="post-author-info">
              <?php $author_id = get_the_author_meta( 'ID' ) ?>
              <img src="<?php echo get_avatar_url($author_id) ?>" alt="<?php the_title(); ?>" class="post-author-avatar">              
              <span class="post-author-name"><?php the_author() ?></span>
              <span class="post-author-rank">Должность</span>
              <span class="post-author-posts">
              <?php plural_form(
                count_user_posts( $author_id ),
                /* варианты написания для количества 1, 2 и 5 */
                array('статья','статьи','статей')
                ) ;?> 
              </span>              
            </div>
            <a href="<?php echo get_author_posts_url($author_id) ?>" class="post-author-link">Страница автора</a>
        </div>
      </div>
    </div>
	</header>

    <!-- Содержимое поста -->
  <div class="container">
    <div class="post-content">
      <?php
      // выводим содержимое
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'universal-example' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        )
      );

      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__( 'Страницы:', 'universal-example' ),
          'after'  => '</div>',
        )
      );
      ?>
    </div>
 
  <!-- Подвал поста -->
    <footer class="post-footer">
      <?php 
        $tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'universal-example' ) );
        if ( $tags_list ) {
          /* translators: 1: list of tags. */
          printf( '<div class="tags-links">' . esc_html__( '%1$s', 'universal-example' ) . '</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
        // Поделиться в соцсетях
        meks_ess_share();
      ?>
    </footer>
  </div>
</article>
<?php
  echo '<div class="sidebar-single"> <div class="container">';  
  $instance = array(
    'quantity' => '4'
  );
  the_widget( 'Posts_Single_Widget', $instance);
  echo '</div></div>';
?>
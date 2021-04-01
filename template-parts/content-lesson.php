<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- шапка поста -->
  <header class="entry-header <?php echo get_post_type()?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75))">
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
        </div>    
        <div class="video">
          <?php 
            $video_link = get_field('video_link');
            if ( strpos( $video_link, 'youtube.com' ) == true) {
              $tmp = explode('?v=', $video_link);
              echo '<iframe width="100%" height="450" src="https://www.youtube.com/embed/' . end ($tmp) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }

            if ( strpos( $video_link, 'vimeo.com' ) == true) {
              $tmp = explode('/', $video_link);
              echo '<iframe src="https://player.vimeo.com/video/' . end ($tmp) . '" width="100%" height="450" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
            }
          ?>
        </div> 
          <?php
            // проверяем, точно ли мы на странице поста
            if ( is_singular() ) :
              the_title( '<h1 class="lesson-title">', '</h1>' );
            else :
              the_title( '<h2 class="lesson-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
          ?>      
        <div class="post-header-info">
          <span class="post-date">
            <svg fill="#BCBFC2" width="15" height="15" class="icon comments-icon">
              <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#clock"></use>
            </svg>
            <?php the_time('j F, G:i') ?>
          </span>
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
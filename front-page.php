<?php get_header(); ?>
<main class="front-page-header">
  <div class="container">
    <div class="hero">
      <div class="left">
        <?php
        // объявляем глобальную переменную
        global $post;

        $myposts = get_posts([ 
          'numberposts' => 1,
          'category_name' => 'javascript, css, html, web-design',
        ]);
        
        // проверяем, есть ли посты?
        if( $myposts ){
          // если есть, запускаем цикл
          foreach( $myposts as $post ){
            setup_postdata( $post );
            ?>
            <!-- Выводим записи -->
            <img src="<?php the_post_thumbnail_url()  ?>" alt="<?php the_title(); ?>" class="post-thumb">
            <?php $author_id = get_the_author_meta( 'ID' ) ?>
            <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
              <img src="<?php echo get_avatar_url($author_id) ?>" alt="<?php the_title(); ?>" class="avatar">
              <div class="author-bio">
                <span class="author-name"><?php the_author() ?></span>
                <span class="author-rank">Должность</span>
              </div>
            </a>
            <div class="post-text">         
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
              <h2 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...') ?></h2>
              <a href="<?php the_permalink() ?>" class="more">Читать далее <img class="more-img"
                  src="<?php echo get_template_directory_uri() . '/assets/images/arrow.svg'  ?>" alt="arrow"> </a>
            </div>
          <?php 
          }
        } else {
          ?> <p>Постов нет</p> <?php
        }

        wp_reset_postdata(); // Сбрасываем $post
      ?>
      </div>
      <div class="right">
        <h3 class="recommend">Рекомендуем</h3>
        <ul class="posts-list">
          <?php
            // объявляем глобальную переменную
            global $post;

            $myposts = get_posts([ 
              'numberposts' => 5,
              'offset' => 1,
              'category_name' => 'javascript, css, html, web-design',
            ]);
            
            // проверяем, есть ли посты?
            if( $myposts ){
              // если есть, запускаем цикл
              foreach( $myposts as $post ){
                setup_postdata( $post );
                ?>
                <!-- Выводим записи -->
          <li class="post">
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
            <a class="post-permalink" href="<?php the_permalink()?>">
              <h4 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...') ?></h4>
            </a>
            
          </li>          
              <?php 
              }
            } else {
              ?> <p>Постов нет</p> <?php
            }

            wp_reset_postdata(); // Сбрасываем $post
          ?>
        </ul>
      </div>
    </div>

    


  </div>
</main>

<div class="container">
  <ul class="article-list">
    <?php
      // объявляем глобальную переменную
      global $post;

      $myposts = get_posts([ 
        'numberposts' => 4,
        'category_name' => 'articles',        
      ]);
      
      // проверяем, есть ли посты?
      if( $myposts ){
        // если есть, запускаем цикл
        foreach( $myposts as $post ){
          setup_postdata( $post );
          ?>
          <!-- Выводим записи -->
    <li class="article-item">
      <a class="article-permalink" href="<?php the_permalink()?>">
        <h4 class="article-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...') ?></h4>
      </a>
      <img width="65" height="65" src="<?php if( has_post_thumbnail() ) {
        echo get_the_post_thumbnail_url( null, 'homepage-thumb' );
      }
      else {
        echo get_template_directory_uri() . '/assets/images/img-default.png';
      }
      ?>" alt="homepage-thumb">
    </li>          
        <?php 
        }
      } else {
        ?> <p>Постов нет</p> <?php
      }

      wp_reset_postdata(); // Сбрасываем $post
    ?>
  </ul>
    
  <div class="main-grid">
    <ul class="article-grid">
      <?php		
        global $post;
        
        $query = new WP_Query( [
          'posts_per_page' => 7,
          'category__not_in' => '34'
        ] );

        if ( $query->have_posts() ) {
          // создаем переменную-счетчик постов
          $cnt = 0;
          // пока посты есть, выводим их
          while ( $query->have_posts() ) {          
            $query->the_post();
            // увеличиваем счетчик постов
            $cnt++;
            switch ($cnt) {
              // выводим первый пост
              case '1':
                ?> 
                  <li class="article-grid-item article-grid-item-1">
                    <a href="<?php the_permalink()?>" class="article-grid-permalink">
                      <img class="article-grid-thumb" src="
                      <?php                  
                        if( has_post_thumbnail() ) {
                          echo get_the_post_thumbnail_url();
                        }
                        else {
                          echo get_template_directory_uri() . '/assets/images/image-default.png';
                        }
                      ?>
                      " alt="">
                      <span class="category-name"><? $category = get_the_category(); echo $category[0]->name; ?></span>
                      <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...') ?></h4>
                      <p class="article-grid-excerpt">
                        <?php echo mb_strimwidth(get_the_excerpt(), 0, 90, '...') ?>
                      </p>
                      <div class="article-grid-info">
                        <div class="author">
                          <?php $author_id = get_the_author_meta( 'ID' ) ?>
                          <img src="<?php echo get_avatar_url($author_id) ?>" alt="<?php the_title(); ?>" class="author-avatar">
                          <span class="author-name"><strong><?php the_author()?></strong> : <?php the_author_meta( 'description' ) ?></span>
                          
                        </div>
                        <div class="comments">
                          <svg fill="#BCBFC2" width="15" height="15" class="icon comments-icon">
                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#comment"></use>
                          </svg>
                          <span class="comments-counter"><?php comments_number( '0', '1', '%' )?></span>
                        </div>
                      </div>
                    </a>
                  </li>
                <?php
                break;

              // Выводим второй пост  
              case '2': 
                ?>
                  <li class="article-grid-item article-grid-item-2">
                    <img src="<?php 
                      if( has_post_thumbnail() ) {
                        echo get_the_post_thumbnail_url();
                      }
                      else {
                        echo get_template_directory_uri() . '/assets/images/image-default.png';
                      }
                    ?>" alt="<?php the_title()?>" class="article-grid-thumb">
                    <a href="<?php the_permalink()?>" class="article-grid-permalink">
                      <span class="tag">
                        <?php $posttags = get_the_tags();
                        if ($posttags) {
                          echo $posttags[0]->name . ' ';
                        } ?>
                      </span>                    
                      <span class="category-name"><? $category = get_the_category(); echo $category[0]->name; ?></span>
                      <h4 class="article-grid-title"><?php echo get_the_title() ?></h4>
                      <div class="article-grid-info">
                        <div class="author">
                          <?php $author_id = get_the_author_meta( 'ID' ) ?>
                          <img src="<?php echo get_avatar_url($author_id) ?>" alt="<?php the_title(); ?>" class="author-avatar">
                          <div class="author-info">
                            <span class="author-name"><strong><?php the_author()?></strong></span>        
                            <span class="date"><?php the_time('j F') ?></span>    
                            <div class="comments">
                              <svg fill="white" opacity="0.4" width="15" height="15" class="icon comments-icon">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#comment"></use>
                              </svg>
                              <span class="comments-counter"><?php comments_number( '0', '1', '%' )?></span>
                            </div>
                            <div class="likes">
                              <img src="<?php echo get_template_directory_uri() . '/assets/images/heart.svg' ?>" alt="icon: like" class="likes-icon">
                              <span class="likes-counter"><?php comments_number( '0', '1', '%' )?></span>
                            </div>    
                          </div>
                        </div>
                        
                      </div>
                    </a>
                  </li>
                <?php

                break;

                case '3': 
                  ?>
                    <li class="article-grid-item article-grid-item-3">
                      <a href="<?php the_permalink();?>" class="article-grid-permalink">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title()?>" class="article-thumb">
                        <h4 class="article-grid-title"><?php the_title() ?></h4>
                      </a>
                    </li>
                  <?php
    
                  break;
              
              // выводим остальные посты
              default: ?>
                <li class="article-grid-item article-grid-item-default">
                  <a href="<?php the_permalink()?>" class="article-grid-permalink">
                    <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0, 45, '...') ?></h4>
                    <p class="article-grid-excerpt">
                      <?php echo mb_strimwidth(get_the_excerpt(), 0, 70, '...') ?>
                    </p>
                    <span class="article-date"><?php the_time('j F') ?></span>
                  </a>
                </li>
                <?php
                break;
            }
            ?>
            <!-- Вывода постов, функции цикла: the_title() и т.д. -->
            <?php 
          }
        } else {
          // Постов не найдено
        }

        wp_reset_postdata(); // Сбрасываем $post
      ?>
    </ul>

    <?php get_sidebar('home-top'); ?>
  </div>
  
</div>

<?php		
global $post;

$query = new WP_Query( [
	'posts_per_page' => 1,
	'category_name'  => 'investigation',
] );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		?>
      <section class="investigation" style="background: linear-gradient(0deg, rgba(64, 48, 61, 0.35), rgba(64, 48, 61, 0.35)), url(benjamin-lambert-KxdO8elL5_c-unsplash.jpg), url(<?php 
        if( has_post_thumbnail() ) {
          echo get_the_post_thumbnail_url();
        }
        else {
          echo get_template_directory_uri() . '/assets/images/image-default.png';
        }
      ?>) no-repeat center center">
        <div class="container">
          <h2 class="investigation-title"><?php the_title(); ?></h2>
          <a href="<?php the_permalink() ?>" class="more">Читать статью <img class="more-img" src="<?php echo get_template_directory_uri() . '/assets/images/arrow.svg'  ?>" alt="arrow"> </a>
        </div>
      </section>
		<?php 
	}
} else {
	// Постов не найдено
}

wp_reset_postdata(); // Сбрасываем $post
?>

<div class="container">
  <div class="article-block-grid">
    <div class="article-block">
      <?php		
        global $post;

        $query = new WP_Query( [
          'posts_per_page' => 6,
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            ?>
              <div class="article-block-item">
                <a href="<?php the_permalink()?>">
                  
                  <img src="<?php 
                  
                    if( has_post_thumbnail() ) {
                      echo get_the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                  ?>" alt="<?php the_title()?>" class="article-block-item-thumb">
                </a>
                <div class="article-block-item-content">
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
                  <a href="<?php the_permalink()?>" class="article-block-item-content-title"><?php echo mb_strimwidth(get_the_title(), 0, 65, '...') ?></a>
                  <p class="article-block-item-content-excerpt">
                    <?php echo mb_strimwidth(get_the_excerpt(), 0, 160, '...') ?>
                  </p>
                  <div class="article-block-item-content-info">
                    <span class="article-date"><?php the_time('j F') ?></span>
                    <div class="comments">
                      <svg fill="#BCBFC2" width="15" height="15" class="icon comments-icon">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#comment"></use>
                      </svg>
                      <span class="comments-counter"><?php comments_number( '0', '1', '%' )?></span>
                    </div>
                    <div class="likes">
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/heart-grey.svg' ?>" alt="icon: like" class="likes-icon">
                      <span class="likes-counter"><?php comments_number( '0', '1', '%' )?></span>
                    </div>   
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
    <?php get_sidebar('home-bottom'); ?>
  </div>
</div>

<div class="special">
  <div class="container">
    <div class="special-grid">
      
    <?php		
      global $post;

      $query = new WP_Query( [
        'posts_per_page' => 1,
        'category_name'  => 'photo-report',
      ] );

      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          ?>
            <div class="photo-report">     
              <div class="swiper-container photo-report-slider">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  <?php $images = get_attached_media( 'image' );
                    foreach ($images as $image) {
                      echo '<div class="swiper-slide"><img src="';
                      print_r($image -> guid);
                      echo '"></div>';
                    };
                  ?>
                </div>
                <div class="swiper-pagination"></div>
              </div>         

              <div class="photo-report-content">
                <?php 
                  foreach (get_the_category() as $category) {
                    printf(
                      '<a href="%s" class="category-link">%s</a>',
                      esc_url( get_category_link( $category ) ), 
                      esc_html( $category -> name )
                    );    
                  }
                ?>
                <?php $author_id = get_the_author_meta( 'ID' ) ?>
                <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
                  <img src="<?php echo get_avatar_url($author_id) ?>" alt="<?php the_title(); ?>" class="author-avatar">
                  <div class="author-bio">
                    <span class="author-name"><?php the_author() ?></span>
                    <span class="author-rank">Должность</span>
                  </div>
                </a>
                <h3 class="photo-report-title"><?php the_title() ?></h3>
                <a href="<?php the_permalink()?>" class="button photo-report-button">
                  <svg width="19" height="15" class="icon photo-report-button-icon">
                    <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#images"></use>
                  </svg>
                  Смотреть фото
                  <span class="button-photo-counter"><?php echo count($images) ?></span>
                </a>
              </div>
            </div>
          <?php 
        }
      } else {
        // Постов не найдено
      }

      wp_reset_postdata(); // Сбрасываем $post
      ?>

      
      <div class="other">
        <div class="career-article">
          <?php		
            global $post;

            $query = new WP_Query( [
              'posts_per_page' => 1,
              'category_name'  => 'career',
            ] );

            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();
                  foreach (get_the_category() as $category) {
                    printf(
                      '<a href="%s" class="category-link">%s</a>',
                      esc_url( get_category_link( $category ) ), 
                      esc_html( $category -> name )
                    );    
                  }
                  ?>
                    <img class="career-article-thumb" src="<?php echo get_template_directory_uri() . '/assets/images/career.png'?>" alt="">
                    <div class="content">
                      <h3 class="career-article-title"><?php echo mb_strimwidth(get_the_title(), 0, 65, '...') ?></h3>
                      <div class="career-article-description"><?php echo mb_strimwidth(get_the_excerpt(), 0, 80, '...') ?></div>
                      <a href="<?php the_permalink() ?>" class="more">
                        Читать далее 
                        <img class="more-img" src="<?php echo get_template_directory_uri() . '/assets/images/arrow.svg'  ?>" alt="arrow"> 
                      </a>
                    </div>
                <?php 
              }
            } else {
              // Постов не найдено
            }

            wp_reset_postdata(); // Сбрасываем $post
            ?>
        </div>
        <div class="other-article-container">
          <?php		
            global $post;

            $query = new WP_Query( [
              'posts_per_page' => 2,
              'category__not_in' => array(40, 41),
            ] );

            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                  <div class="other-article">
                    <h3 class="other-article-title"><?php echo mb_strimwidth(get_the_title(), 0, 20, '...') ?></h3>
                    <div class="other-article-description"><?php echo mb_strimwidth(get_the_excerpt(), 0, 73, '...') ?></div>
                    <div class="other-article-date"><?php the_time('j F') ?></div>
                  </div>
                <?php 
              }
            } else {
              // Постов не найдено
            }

            wp_reset_postdata(); // Сбрасываем $post
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer() ?>
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
              <?php the_category() ?>
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
            <?php the_category() ?>
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
  <ul class="article-grid">
    <?php		
      global $post;
      
      $query = new WP_Query( [
        'posts_per_page' => 7,
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
                  <img class="article-grid-thumb" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
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
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/comment.svg'  ?>" alt="" class="comments-icon">
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
                  <img src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php the_title()?>" class="article-grid-thumb">
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
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/comment-white.svg'  ?>" alt="icon: comment" class="comments-icon">
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
</div>
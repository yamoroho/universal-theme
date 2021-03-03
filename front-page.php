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
            <img src="<?php the_post_thumbnail_url()  ?>" alt="post-img" class="post-thumb">
            <?php $author_id = get_the_author_meta( 'ID' ) ?>
            <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
              <img src="<?php echo get_avatar_url($author_id) ?>" alt="avatar" class="avatar">
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
</div>
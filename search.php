<?php
get_header();
?> 
<div class="container">
  <h1 class="search-title">Результаты поиска по запросу:</h1>
  <div class="article-block-grid">    
    
    <div class="article-block">
      <?php while ( have_posts() ){ the_post(); ?>
        
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
        
      <?php } ?>
      <?php if ( ! have_posts() ){ ?>
        Записей нет.
      <?php } ?>      
    </div>
    

    <?php get_sidebar('search'); ?>

    <?php 
    $args = array(
      'prev_text'    => __('
      <svg fill="#BCBFC2" width="15" height="7" class="icon prev-icon">
        <use xlink:href="'.get_template_directory_uri().'/assets/images/sprite.svg#left-arrow"></use>
      </svg>
      Назад'),
	    'next_text'    => __('
      Вперед 
      <svg fill="#BCBFC2" width="15" height="7" class="icon next-icon">
        <use xlink:href="'.get_template_directory_uri().'/assets/images/sprite.svg#arrow"></use>
      </svg>
      '),
    );
    the_posts_pagination( $args ) ?>
  </div>
</div>
<?php
get_footer();
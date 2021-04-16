<?php get_header(); ?>
<div class="container">
  <?php if ( function_exists( 'the_breadcrumbs' ) ) the_breadcrumbs(); ?>
  <h1 class="category-title">
    <?php single_cat_title(); ?>
  </h1>
  <div class="post-list">
    <?php while ( have_posts() ){ the_post(); ?>
      <div class="post-card">
        <a href="<?php the_permalink() ?>"><img src="<?php 
        if( has_post_thumbnail() ) {
          echo get_the_post_thumbnail_url();
        }
        else {
          echo get_template_directory_uri() . '/assets/images/image-default.png';
        }
        ?>" alt="" class="post-card-thumb"></a>
        <div class="post-card-text">
          <a href="<?php the_permalink() ?>"><h2 class="post-card-title"><?php the_title(); ?></h2></a>
          <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 90, '...') ?></p>
          <div class="author">
            <?php $author_id = get_the_author_meta( 'ID' ) ?>
            <img src="<?php echo get_avatar_url($author_id) ?>" alt="<?php the_title(); ?>" class="author-avatar">
            <div class="author-info">
              <span class="author-name"><strong><?php the_author()?></strong></span>        
              <span class="date"><?php the_time('j F') ?></span>    
              <div class="comments">
                <svg fill="#BCBFC2" opacity="0.4" width="15" height="15" class="icon comments-icon">
                  <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#comment"></use>
                </svg>
                <span class="comments-counter"><?php comments_number( '0', '1', '%' )?></span>
              </div>
              <div class="likes">
                <svg fill="#BCBFC2" opacity="0.4" width="15" height="15" class="icon comments-icon">
                  <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#heart"></use>
                </svg>
                <span class="likes-counter"><?php comments_number( '0', '1', '%' )?></span>
              </div>    
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ( ! have_posts() ){ ?>
      Записей нет.
    <?php } ?>
  </div>

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
<?php get_footer(); ?>
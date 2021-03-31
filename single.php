<?php get_header('post'); ?>
  <main class="site-main">  
  <?php
    // запускаем цикл Wordpress, проверяем есть ли посты
		while ( have_posts() ) :
      // если пост есть, выводим содержимое
			the_post();

      // находим шаблон для вывода поста в шапке template_parts
			get_template_part( 'template-parts/content', get_post_type() );
			
      echo '<div class="container">';
			// Если комментарии к записи открыты, выводим комментарии
			if ( comments_open() || get_comments_number() ) :
        // находим файл commment.php и выводим его
				comments_template();
			endif;
      echo '</div>';

		  endwhile; // Конец цыкла Wordpress.
		?>
    
  </main>
<?php get_footer(); ?>
<?php
/*
Template Name: Страница контакты
Template Post Type: page
*/

get_header();
?>

<section class="section-dark">
  <div class="container">
    <?php the_title( '<h1 class="page-title">', '</h1>', true ); ?>
    <div class="contacts-wrapper">
      <div class="left">
        <p class="page-text">Через форму обратной связи</p>
        <!-- <form action="#" class="contacts-form" method="POST">
          <input name="contact_name" type="text" class="input contacts-input" placeholder="Ваше имя">
          <input name="contact_email" type="email" class="input contacts-input" placeholder="Ваш Email">
          <textarea name="contact_comment" id="" class="textarea contacts-textarea" placeholder="Ваш вопрос"></textarea>
          <button type="submit" class="button more">Отправить
          <svg fill="#ffffff" width="15" height="15" class="icon comments-icon">
            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/sprite.svg#arrow"></use>
          </svg>
          </button>
        </form> -->
        <?php the_content() ?>
      </div> 
      <div class="right"></div>
    </div>
  </div>
</section>

<?php
get_footer();
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
        <h2 class="contacts-title">Через форму обратной связи</h2>
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
      <div class="right">
        <h2 class="contacts-title">Или по этим контактам</h2>
        <?php
          // $email = get_post_meta( get_the_ID(), 'email', true );
          // if ($email) {echo '<a href="mailto:' . $email . '">' . $email . '</a>';}

          // $address = get_post_meta( get_the_ID(), 'address', true );
          // if ($address) {echo '<address>' . $address . '</address>';}

          // $phone = get_post_meta( get_the_ID(), 'phone', true );
          // if ($phone) {echo '<a href="tel:' . $phone . '">' . $phone . '</a>';}
        ?>
        <a href="<?php the_field('email'); ?>"> <?php the_field('email') ?> </a>
        <address> <?php the_field('address') ?> </address>
        <a href="<?php the_field('phone'); ?>"> <?php the_field('phone') ?> </a>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
  <footer class="footer">
    <div class="container">

      <?php if( is_front_page() ) {
        ?>
        <div class="footer-form-wrapper">
          <h3 class="footer-form-title">Подпишитесь на нашу рассылку</h3>
          <form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post" class="footer-form">
            <!-- Поле Email (обязательно) -->
            <input require type="text" name="email" placeholder="Введите email" class="input footer-form-input" />
            <!-- Токен списка -->
            <!-- Получить API ID на: https://app.getresponse.com/campaign_list.html -->
            <input type="hidden" name="campaign_token" value="o9Cce" />
            <!-- Страница благодарности -->
            <input type="hidden" name="thankyou_url" value="<? echo home_url('thankyou') ?>"/>
            <!-- Добавить подписчика в цикл на определенный день -->
            <input type="hidden" name="start_day" value="0" />
            <!-- Кнопка подписаться -->
            <button type="submit">Подписаться</button>
          </form>
        </div>
      <?php } ?>
        
      <aside class="footer-menu-bar">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
      </aside>

      <div class="footer-info">
        <?php 
          if( has_custom_logo() ){
            echo '<div class="logo">';
            
              if( is_front_page() ){
                $logo_img = '';
                if( $custom_logo_id = get_theme_mod('custom_logo') ){
                  $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                    'class'    => 'custom-logo',
                    'itemprop' => 'logo',
                  ) );
                }
                echo $logo_img;
                echo '</div>';
              } else {
                the_custom_logo();                
                echo '</div>';
              }
          } else {
            if( is_front_page() ){
              echo '<span class="logo-name">';
              bloginfo('name');
              echo '</span>';
            } else {
              echo '<a class="logo-name" href="'.get_home_url().'">';
              echo bloginfo('name');
              echo '</a></div>';
            }
          }  

          wp_nav_menu( [
            'theme_location'  => 'footer_menu',
            'container'       => 'nav', 
            'menu_class'      => 'footer-nav', 
            'echo'            => true,
          ] );
        
          $instance = array(
            'link_facebook' => 'https://fb.com/',
            'link_twitter' => 'https://twitter.com/',
            'link_youtube' => 'https://youtube.com/',
            'link_instagram' => 'https://www.instagram.com/',
            'title' => ''
          );
          $args = array(
            'before_widget' => '<div class="widget-social_networks">',
            'after_widget' => '</div>',
          );
          the_widget( 'Social_Networks_Widget', $instance, $args );
        ?>            
      </div>
      <div class="footer-text-wrapper">
        <?php dynamic_sidebar( 'sidebar-footer-text' ); ?>
        <span class="footer-copyright"><?php echo date( 'Y' ) . ' &copy ' . get_bloginfo( 'name' ) ?></span>
      </div>
    </div>
  </footer>
  <?php wp_footer() ?>
  </body>
</html>
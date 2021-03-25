<footer class="footer">
    <div class="container">

        
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
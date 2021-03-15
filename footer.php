  <footer class="footer">
    <div class="container">
        
      <aside class="footer-menu-bar">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
      </aside>

      <div class="footer-info">
        <?php 
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
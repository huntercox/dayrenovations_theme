<footer>
  <div class="inner">
    <div class="contact-info">
      <?php
        $phone = get_field('phone_number', 'option');
        $email = get_field('email_address', 'option');
        $facebook = get_field('facebook_page', 'option');
      ?>
      <ul>
        <?php if ( $email ) : ?>
          <li class="email">
            <i class="fas fa-paper-plane"></i>
            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
          </li>
        <?php endif; ?>

        <?php if ( $phone ) : ?>
          <li class="phone">
            <i class="fas fa-phone-square-alt"></i><?php echo $phone; ?>
          </li>
        <?php endif; ?>

        <?php if ( $facebook ) : ?>
          <li class="facebook">
            <i class="fab fa-facebook-square"></i>
            <a href="<?php echo $facebook; ?>" target="_blank">Facebook</a>
          </li>
        <?php endif; ?>
      </ul>
    </div><!-- /.contact-info -->

    <div class="sub-menu">
      <nav role="navigation">
        <?php
          wp_nav_menu(
            array(
              'menu' => 'footer-menu',
              'container' => 'ul'
            )
          );
        ?>
      </nav>
    </div><!-- /.sub-menu -->

    <div class="service-area">
      <?php
        if ( get_field('service_area_map', 'option') ) {
          $attachment_id = get_field('service_area_map', 'option');
          $size = "service-area"; // (thumbnail, medium, large, full or custom size)
          $img = wp_get_attachment_image_src( $attachment_id, $size );
          echo '<div style="background-image: url('.$img[0].');"></div>';
        }
      ?>
    </div><!-- /.service-area -->
  </div><!-- /.inner -->


  <!-- <div class="bottom-footer">
    <p><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
  </div> -->
</footer>

</div>
<!-- END: Grid-Layout -->

</body>
</html>
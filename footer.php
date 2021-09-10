<footer>
  <div class="inner">
    <div class="contact-info">
      <?php
      // Phone Number
        if ( get_field('phone_number', 'option') ) : ?>
        <p><i class="fas fa-phone-square-alt"></i><?php echo get_field('phone_number', 'option'); ?></p>
      <?php endif;

      // Email
        $email = get_field('email_address', 'option');
        if ( $email ) : ?>
        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
      <?php endif;

      // Facebook
        $facebook = get_field('email_address', 'option');
        if ( $facebook ) : ?>
        <a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-square"></i>Facebook</a>
      <?php endif; ?>
    </div><!-- /.contact-info -->
  </div><!-- /.inner -->


  <div class="bottom-footer">
    <p><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
  </div>
</footer>

</div>
<!-- END: Grid-Layout -->

</body>
</html>
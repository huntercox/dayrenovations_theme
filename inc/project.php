<?php
  $feat_img_id = get_post_thumbnail_id();
  $feat_img = wp_get_attachment_image_src( $feat_img_id, 'medium' );
  $feat_img_url = $feat_img[0];
  $content = get_the_content();

  $id   = get_post_field('ID');
  $slug = get_post_field('post_name');

  ?>
  <div class="project project_<?php echo $slug.' project_'.$id;?>">
    <div class="top" style="background-image: url('<?php echo $feat_img_url; ?>');">
      <div class="overlay">
        <h4><a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?></a></h4>
        <?php
          echo '<ul class="services">';
            foreach ( get_the_terms( get_the_ID(), 'service' ) as $tax ) {
              echo '<li><strong>' . __( $tax->name ) . '</strong></li>';
            }
          echo '</ul>';
        ?>
      </div><!-- /.overlay -->
    </div><!-- /.top -->

    <div class="bottom">
      <div class="post-content">
        <?php echo mb_strimwidth($content, 0, 150, '...'); ?>
      </div>
    </div><!-- /.bottom -->
  </div><!-- /.project -->
<?php get_header(); ?>

  <main id="main" role="main">
    <?php if ( have_rows('home_banner') ) : ?>
      <section class="splide">
        <div class="splide__track">
          <ul class="splide__list">
            <?php while( have_rows('home_banner') ) : the_row(); ?>
            <?php
              $img_size = 'large';
              $img_id   = get_sub_field('banner_image');
              $banner_img = wp_get_attachment_image( $img_id, $img_size );
              $banner_url = wp_get_attachment_image_src( $img_id, $img_size );
              $banner_url = $banner_url[0];
              $banner_description = get_sub_field('banner_description');
            ?>
            <li class="splide__slide">
              <?php echo $banner_img; ?>
              <!-- <div class="banner__image-container" style="background-image: url('<?php //echo $banner_url; ?>')" alt="<?php //echo esc_attr( $banner_description ); ?>"></div> -->
            </li><!-- /.splide__slide -->

            <?php endwhile; ?>
          </ul><!-- /.splide__list -->
        </div><!-- /.banner__images -->
      </section><!-- /.banner -->
    <?php endif; ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" role="article">
        <div class="inner-content">
          <?php the_content(); ?>
        </div><!-- /.inner-content -->
      </article>
    <?php endwhile; endif; ?>
  </main>

<?php get_footer(); ?>
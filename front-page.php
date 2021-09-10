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

  <!-- Intro -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="home__intro" id="post-<?php the_ID(); ?>" role="article">
        <div class="inner-content">
          <?php the_content(); ?>
        </div><!-- /.inner-content -->
      </article><!-- /.home__intro -->
    <?php endwhile; endif; ?>

  <!-- Contact Form -->
    <div class="home__contact-form">
      <div class="form__content">
        <?php if ( get_field('home_form_heading') ) : ?>
          <h2><?php echo get_field('home_form_heading'); ?></h2>
        <?php endif; ?>

        <?php if ( get_field('home_form_description') ) : ?>
          <p><?php echo get_field('home_form_description'); ?></p>
        <?php endif; ?>

      </div><!-- /.form__content -->

      <div class="form__cf7">
        <?php echo do_shortcode( '[contact-form-7 id="15" title="Contact form 1"]' ); ?>
      </div><!-- /.form__cf7 -->

    </div><!-- /.home__contact-form -->

  </main>

<?php get_footer(); ?>
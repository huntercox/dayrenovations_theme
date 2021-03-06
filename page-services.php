<?php get_header(); ?>

  <main id="main" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" role="article" class=="page">

        <h2 class="page__title"><?php the_title(); ?></h2>

        <div class="page__content">
          <?php the_content(); ?>
        </div><!-- /.page__content -->

        <section class="services">
          <?php if ( have_rows('services_list') ) : ?>

            <?php while( have_rows('services_list') ) : the_row(); ?>

              <h3><?php the_sub_field('service_name'); ?></h3>
              <p><?php the_sub_field('service_description'); ?></p>
              <?php
                $gallery = get_sub_field('service_gallery');

                if ($gallery) {
                  $size = 'medium';
                  $i = 0;
                  foreach ( $gallery as $img_id ) {
                    $i++;
                    echo wp_get_attachment_image( $img_id, $size );
                  }
                }
              ?>

            <?php endwhile; ?>

          <?php endif; ?>

        </section>

      </article>
    <?php endwhile; ?>
    <?php else : ?>
      <p>There is nothing on this page.</p>
    <?php endif; ?>
  </main>

<?php get_footer(); ?>
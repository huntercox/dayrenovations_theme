<?php get_header(); ?>

  <main id="main" role="main">
    <?php
      if ( has_post_thumbnail() ) {
        $attachment_id = get_post_thumbnail_id();
        $size = "featured-banner";
        $url = wp_get_attachment_image_src( $attachment_id, $size );
        echo '<div class="featured-banner" style="background-image: url('.$url[0].');"></div>';
      }
    ?>

    <div class="inner">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" role="article" class="page">

          <h2 class="page__title"><?php the_title(); ?></h2>

          <div class="page__content">
            <?php the_content(); ?>
          </div><!-- /.page__content -->

          <div class="project-breakdown">
            <?php if ( have_rows('project_sections') ) : ?>

              <?php while( have_rows('project_sections') ) : the_row(); ?>

                <?php
                  $section_name = get_sub_field('section_name');
                  $description  = get_sub_field('section_description');
                  $tasks        = get_sub_field('section_tasks');
                  $services     = get_sub_field('section_services');
                  $areas        = get_sub_field('section_areas');

                  if ( $section_name ) {
                    echo '<h2>'.$section_name.'</h2>';
                  }

                  if ( $description ) {
                    echo '<p>'.$description.'</p>';
                  }

                  if ($services) {
                    echo '<h4>'.$section_name.' - Services</h4>';
                    echo '<ul class="section-services">';
                    foreach($services as $service) {
                      echo '<li><strong>'. esc_html( $service->name ) .'</strong></li>';
                    }
                    echo '</ul>';
                  }

                  if ($areas) {
                    echo '<h4>'.$section_name.' - Areas</h4>';
                    echo '<ul class="section-areas">';
                    foreach($areas as $area) {
                      echo '<li><strong>'. esc_html( $area->name ) .'</strong></li>';
                    }
                    echo '</ul>';
                  }

                  if ( have_rows('section_tasks') ) :

                    while( have_rows('section_tasks') ) : the_row();


                      $task_name = get_sub_field('task_name');

                      echo 'Task: '.$task_name.'<br />';

                    endwhile;

                  endif;

                ?>


              <?php endwhile; ?>

            <?php endif; ?>

          </div><!-- /.project-breakdown -->

        </article>
      <?php endwhile; ?>
      <?php else : ?>
        <p>There is nothing on this page.</p>
      <?php endif; ?>
    </div><!-- /.inner -->
  </main>

<?php get_footer(); ?>
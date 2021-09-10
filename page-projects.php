<?php get_header(); ?>

<main id="main" role="main">
  <div class="inner">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" role="article" class="page">

        <h2 class="page__title"><?php the_title(); ?></h2>

        <div class="page__content">
          <?php the_content(); ?>
        </div><!-- /.page__content -->

        <h4>List projects:</h4>
        <?php
          $args = array(
            'post_type'      => 'project'
          );
          $projects = new WP_Query($args);
          if ( $projects->have_posts() ) :
            echo '<div class="projects-list">';

            while ( $projects->have_posts() ) : $projects->the_post();

              get_template_part('inc/project');

            endwhile;

            echo '</div><!-- /.projects-list -->';
          endif;
        ?>
      </article>
    <?php endwhile; ?>
    <?php else : ?>
      <p>There is nothing on this page.</p>
    <?php endif; ?>
  </div><!-- /.inner -->
</main>

<?php get_footer(); ?>
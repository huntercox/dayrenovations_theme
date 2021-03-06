<?php get_header(); ?>

  <main id="main" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" role="article" class=="page">

        <h2 class="page__title"><?php the_title(); ?></h2>

        <div class="page__content">
          <?php the_content(); ?>
        </div><!-- /.page__content -->

      </article>
    <?php endwhile; ?>
    <?php else : ?>
      <p>There is nothing on this page.</p>
    <?php endif; ?>
  </main>

<?php get_footer(); ?>
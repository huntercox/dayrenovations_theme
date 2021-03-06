<?php get_header(); ?>

    <main id="main" role="main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
        <h2><?php the_title(); ?></h2>
        <div class="inner-content">
          <?php the_content(); ?>
        </div><!-- /.inner-content -->
      </article>
      <?php endwhile; ?>
        <h4>Other stuff happening after the loop...</h4>
			<?php else : ?>
        <p>There is nothing in the loop.</p>
      <?php endif; ?>
    </main>

<?php get_footer(); ?>
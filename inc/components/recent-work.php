<?php
// make a custom field to add a carousel of recent work as pictures
// add this to the Site Options page in the WP Admin

$images = get_field('gallery');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $images ): ?>
	<ul>
		<?php foreach( $images as $image_id ): ?>
			<li>
				<?php
					$img = wp_get_attachment_image( $image_id, $size );
					echo esc_html( $img );
				?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
<article <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<?php
		if( has_post_thumbnail( get_the_ID() ) ) {
			$image = '<figure>' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</figure>';
			$noimage = '';
		} else {
			$image = '<i class="material-icons photo">photo_size_select_actual</i>';
			$noimage = ' noimage';
		}
		?>
		<div class="post_image<?php echo esc_attr( $noimage ); ?>">
			<?php echo wp_kses_post( $image ); ?>
			<div class="readmore"><span><?php esc_html_e( 'Read More', 'nishiki' ); ?><i class="material-icons">navigate_next</i></span></div>
		</div>
		<header><?php the_title( '<h1>', '</h1>' ); ?></header>
		<div class="excerpt"><?php echo esc_html( get_the_excerpt() ); ?></div>
	</a>
	<footer>
		<?php
		if( get_theme_mod( 'setting_archive_display_date', true ) ) {
			echo '<span class="date">' . esc_html( get_the_time( get_option( 'date_format' ) ) ) . '</span>';
		}
		if( !is_category() && get_theme_mod( 'setting_archive_display_archive', true ) ){
			$categories = get_the_category();
			$separator = '/';
			$output = '';
			if( $categories ){
				foreach ( $categories as $category ) {
					$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . $category->cat_name . '</a>' . $separator;
				}
				$output = trim( $output, $separator );
			}
			echo '<span class="cat"><i class="material-icons">folder</i>' . $output . '</span>';
		}
		if( get_theme_mod( 'setting_archive_display_comment', true ) ){
			$comment_count = wp_count_comments( get_the_ID() );
			$comment_num = $comment_count->approved;
			if( $comment_num !== 0 ){
				echo '<span class="comment"><i class="material-icons">comment</i>' . intval( $comment_num ) . '</span>';
			}
		}
		if( get_theme_mod( 'setting_archive_display_author', true ) ) {
			echo '<span class="author">' . esc_html( get_the_author() ) . '</span>';
		}
		?>
	</footer>
</article>

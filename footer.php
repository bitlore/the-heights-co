<?php
/**
 * The template for displaying the footer.
 * Comtains closing divs for header.php.
 */
 ?>
				<footer class="footer" role="contentinfo">

					<div class="footer-wrap grid-x grid-padding-x">
						<div class="footer-content row-padding display-flex justify-center align-center direction-column text-center small-12 medium-6 medium-offset-3 large-8 large-offset-2 cell">
							<?php echo get_field('footer_text', 'option'); ?>
						</div>
                        <div class="footer-links row-padding small-12 medium-3 large-2 cell">
                            <?php if(have_rows('footer_links', 'option')) { ?>
                                <ul>
                                <?php while(have_rows('footer_links', 'option')) { the_row(); ?>
                                    <li>
                                        <a class="footer-link" href="<?php echo get_sub_field('link')['url']; ?>" target="<?php echo get_sub_field('link')['target']; ?>">
                                            <img class="footer-icon" src="<?php echo get_sub_field('icon')['url']; ?>" alt=""><span><?php echo get_sub_field('link')['title']; ?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
					</div>
				</footer>

			</div>  <!-- end .off-canvas-content -->

		</div> <!-- end .off-canvas-wrapper -->

        <?php get_template_part( 'parts/content', 'age-gate' ); ?>

        <?php wp_footer(); ?>

	</body>

</html> <!-- end page -->

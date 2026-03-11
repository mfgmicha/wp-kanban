<?php
/**
 * Render callback for the Kanban Board Block.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 */

if ( ! function_exists( 'telex_kanban_board_get_data' ) ) {
	return;
}

$board_data = telex_kanban_board_get_data();
$can_edit   = current_user_can( 'edit_posts' ) ? '1' : '0';
$rest_url   = esc_url( rest_url( '/' ) );
$nonce      = wp_create_nonce( 'wp_rest' );

$wrapper_attributes = get_block_wrapper_attributes();
?>
<div <?php echo $wrapper_attributes; ?>>
	<div
		class="kanban-board"
		data-kanban-interactive="true"
		data-can-edit="<?php echo esc_attr( $can_edit ); ?>"
		data-rest-url="<?php echo esc_attr( $rest_url ); ?>"
		data-nonce="<?php echo esc_attr( $nonce ); ?>"
	>
		<?php if ( empty( $board_data ) ) : ?>
			<p class="kanban-empty">
				<?php esc_html_e( 'No columns found. Create columns under Tasks - Columns.', 'telex-kanban-board' ); ?>
			</p>
		<?php else : ?>
			<?php foreach ( $board_data as $column ) : ?>
				<div class="kanban-column">
					<div class="kanban-column-header">
						<h3 class="kanban-column-title"><?php echo esc_html( $column['name'] ); ?></h3>
						<span class="kanban-column-count"><?php echo count( $column['tasks'] ); ?></span>
					</div>
					<div class="kanban-cards" data-column-id="<?php echo esc_attr( $column['id'] ); ?>">
						<?php if ( empty( $column['tasks'] ) ) : ?>
							<p class="kanban-empty">
								<?php esc_html_e( 'No tasks yet', 'telex-kanban-board' ); ?>
							</p>
						<?php else : ?>
							<?php foreach ( $column['tasks'] as $task ) : ?>
								<div class="kanban-card" data-task-id="<?php echo esc_attr( $task['id'] ); ?>">
									<div class="kanban-card-title"><?php echo esc_html( $task['title'] ); ?></div>
									<?php if ( ! empty( $task['description'] ) ) : ?>
										<div class="kanban-card-desc"><?php echo esc_html( $task['description'] ); ?></div>
									<?php endif; ?>
									<?php if ( '1' === $can_edit ) : ?>
										<div class="kanban-card-actions">
											<button class="kanban-card-delete" aria-label="<?php esc_attr_e( 'Delete task', 'telex-kanban-board' ); ?>">&times;</button>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<?php if ( '1' === $can_edit ) : ?>
						<div class="kanban-add-card">
							<button class="kanban-add-btn">+ <?php esc_html_e( 'Add card', 'telex-kanban-board' ); ?></button>
							<div class="kanban-add-form" style="display: none;">
								<input type="text" class="kanban-input kanban-input-title" placeholder="<?php esc_attr_e( 'Task title...', 'telex-kanban-board' ); ?>" />
								<textarea class="kanban-input kanban-textarea kanban-input-desc" placeholder="<?php esc_attr_e( 'Description (optional)...', 'telex-kanban-board' ); ?>"></textarea>
								<div class="kanban-form-actions">
									<button class="kanban-submit-btn"><?php esc_html_e( 'Add', 'telex-kanban-board' ); ?></button>
									<button class="kanban-cancel-btn"><?php esc_html_e( 'Cancel', 'telex-kanban-board' ); ?></button>
								</div>
							</div>
						</div>
					<?php else : ?>
						<div class="kanban-login-notice">
							<?php esc_html_e( 'Log in to add and manage tasks.', 'telex-kanban-board' ); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
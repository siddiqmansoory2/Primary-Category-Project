<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$skip_post_types  = array("Page");
$skip_taxonomies = array( 'post_tag', 'post_format' );
$post_types = array_diff_key( get_post_types( array('public' => true), 'object', 'and' ), $skip_post_types );
$load_settings = CmsMinds_Admin::load_settings();

?>
<form method="post" action="<?php echo esc_url( admin_url( 'options-general.php?page=primarycategory-options' ) ); ?>" id="primarycategory_form">
    <h1>Primary Category Project</h1>
    <p>TO enabel Select from below listed taxonomies for each post types.</p>

	<?php
	wp_nonce_field( 'primarycategory-settings-options', 'primarycategory_settings_nonce' );
	if ( $post_types && is_array( $post_types ) )
	{
		?>
        <table class="form-table">
            <tbody>
			<?php
			foreach ( $post_types as $post_type )
			{
				$post_taxonomies = get_object_taxonomies( $post_type->name, 'object' );

				if ( $post_taxonomies && is_array( $post_taxonomies ) )
				{

					echo '<h2>' . $post_type->label . '</h2>';

					foreach ( $post_taxonomies as $post_taxonomy )
					{

						$checked = '';
						if ( $load_settings && array_key_exists( $post_type->name, $load_settings ) )
						{
							if ( in_array( $post_taxonomy->name, $load_settings[ $post_type->name ] ) )
							{
								$checked = 'checked';
							}
						}

						if ( in_array( $post_taxonomy->name, $skip_taxonomies ) )
						{
							continue;
						}

						$taxonomy_title = $post_taxonomy->label ? $post_taxonomy->label : $post_taxonomy->name;

						$unique_id = 'primarycategory-primary-categories-' . $post_type->name . '-' . $post_taxonomy->name;

						echo '<input type="checkbox" id="'. $unique_id .'" name="primarycategory_primary_categories[' . $post_type->name . '][]" value="' . $post_taxonomy->name . '" ' . $checked . '><label for="'.$unique_id.'">'.$taxonomy_title.'</label>';
					}

				}
			}
			?>
            </tbody>
        </table>

		<?php
	}
	?>
    <p class="submit"><input class="button-primary" type="submit" value="Update Settings"></p>
</form>

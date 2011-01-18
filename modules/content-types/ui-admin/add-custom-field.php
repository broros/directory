<?php if (!defined('ABSPATH')) die('No direct access allowed!'); ?>

<?php $post_types = get_post_types('','names'); ?>

<h3><?php _e('Add Custom Field', 'content_types'); ?></h3>
<form action="" method="post" class="ct-custom-fields">
    <div class="ct-wrap-left">
        <div class="ct-table-wrap">
            <div class="ct-arrow"><br></div>
            <h3 class="ct-toggle"><?php _e('Field Title', 'content_types') ?></h3>
            <table class="form-table <?php do_action('ct_invalid_field_title'); ?>">
                <tr>
                    <th>
                        <label for="field_title"><?php _e('Field Title', 'content_types') ?> <span class="ct-required">( <?php _e('required', 'content_types'); ?> )</span></label>
                    </th>
                    <td>
                        <input type="text" name="field_title" value="<?php if ( isset( $_POST['field_title'] ) ) echo $_POST['field_title']; ?>">
                        <span class="description"><?php _e('The title of the custom field.', 'content_types'); ?></span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="ct-table-wrap">
            <div class="ct-arrow"><br></div>
            <h3 class="ct-toggle"><?php _e('Field Type', 'content_types') ?></h3>
            <table class="form-table <?php do_action('ct_invalid_field_options'); ?>">
                <tr>
                    <th>
                        <label for="field_type"><?php _e('Field Type', 'content_types') ?> <span class="ct-required">( <?php _e('required', 'content_types'); ?> )</span></label>
                    </th>
                    <td>
                        <select name="field_type">
                            <option value="text" <?php if ( isset( $_POST['field_type'] ) && $_POST['field_type'] == 'text' ) echo( 'selected="selected"' ); ?>><?php _e('Text Box', 'content_types'); ?></option>
                            <option value="textarea" <?php if ( isset( $_POST['field_type'] ) && $_POST['field_type'] == 'textarea' ) echo( 'selected="selected"' ); ?>><?php _e('Multi-line Text Box', 'content_types'); ?></option>
                            <option value="radio" <?php if ( isset( $_POST['field_type'] ) && $_POST['field_type'] == 'radio' ) echo( 'selected="selected"' ); ?>><?php _e('Radio Buttons', 'content_types'); ?></option>
                            <option value="checkbox" <?php if ( isset( $_POST['field_type'] ) && $_POST['field_type'] == 'checkbox' ) echo( 'selected="selected"' ); ?>><?php _e('Checkboxes', 'content_types'); ?></option>
                            <option value="selectbox" <?php if ( isset( $_POST['field_type'] ) && $_POST['field_type'] == 'selectbox' ) echo( 'selected="selected"' ); ?>><?php _e('Drop Down Select Box', 'content_types'); ?></option>
                            <option value="multiselectbox" <?php if ( isset( $_POST['field_type'] ) && $_POST['field_type'] == 'multiselectbox' ) echo( 'selected="selected"' ); ?>><?php _e('Multi Select Box', 'content_types'); ?></option>
                        </select>
                        <span class="description"><?php _e('Select one or more post types to add this custom field to.', 'content_types'); ?></span>
                        <div class="ct-field-type-options">
                            <h4><?php _e('Fill in the options for this field', 'content_types'); ?>:</h4>
                            <p><?php _e('Order By', 'content_types'); ?> :
                                <select name="field_sort_order">
                                    <option value="default"><?php _e('Order Entered', 'content_types'); ?></option>
                                    <?php /** @todo introduce the additional order options
                                    <option value="asc"><?php _e('Name - Ascending', 'content_types'); ?></option>
                                    <option value="desc"><?php _e('Name - Descending', 'content_types'); ?></option>
                                    */ ?>
                                </select
                            </p>
                            <p><?php _e('Option', 'content_types'); ?> 1:
                                <input type="text" name="field_options[1]" value="<?php if ( isset( $_POST['field_options'][1] ) ) echo $_POST['field_options'][1]; ?>">
                                <input type="radio" value="1" name="field_default_option" <?php if ( isset( $_POST['field_default_option'] ) && $_POST['field_default_option'] == '1' ) echo 'checked="checked"'; ?>>
                                <?php _e('Default Value', 'content_types'); ?>
                            </p>
                            <div class="ct-field-additional-options"></div>
                            <input type="hidden" value="1" name="track_number">
                            <p><a href="#" class="ct-field-add-option"><?php _e('Add another option', 'content_types'); ?></a></p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="ct-table-wrap">
            <div class="ct-arrow"><br></div>
            <h3 class="ct-toggle"><?php _e('Field Description', 'content_types') ?></h3>
            <table class="form-table">
                <tr>
                    <th>
                        <label for="field_description"><?php _e('Field Description', 'content_types') ?></label>
                    </th>
                    <td>
                        <textarea class="ct-field-description" name="field_description" rows="3" ><?php if ( isset( $_POST['field_description'] ) ) echo $_POST['field_description']; ?></textarea>
                        <span class="description"><?php _e('Description for the custom field.', 'content_types'); ?></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="ct-wrap-right">
        <div class="ct-table-wrap">
            <div class="ct-arrow"><br></div>
            <h3 class="ct-toggle"><?php _e('Post Type', 'content_types') ?></h3>
            <table class="form-table <?php do_action('ct_invalid_field_object_type'); ?>">
                <tr>
                    <th>
                        <label for="object_type"><?php _e('Post Type', 'content_types') ?> <span class="ct-required">( <?php _e('required', 'content_types'); ?> )</span></label>
                    </th>
                    <td>
                        <select name="object_type[]" multiple="multiple" class="ct-object-type">
                            <?php if ( is_array( $post_types )): ?>
                                <?php foreach( $post_types as $post_type ): ?>
                                    <option value="<?php echo ( $post_type ); ?>" <?php if ( isset( $_POST['object_type'] ) && is_array( $_POST['object_type'] )) { foreach ( $_POST['object_type'] as $post_value ) { if ( $post_value == $post_type ) echo( 'selected="selected"' ); }} ?>><?php echo ( $post_type ); ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br />
                        <span class="description"><?php _e('Select one or more post types to add this custom field to.', 'content_types'); ?></span>
                    </td>
                </tr>
            </table>
        </div>
        <?php /** @todo implement required fields
        <div class="ct-table-wrap">
            <div class="ct-arrow"><br></div>
            <h3 class="ct-toggle"><?php _e('Required Field', 'content_types') ?></h3>
            <table class="form-table">
                <tr>
                    <th>
                        <label for="required"><?php _e('Required Field', 'content_types') ?></label>
                    </th>
                    <td>
                        <span class="description"><?php _e('Should this field be required.', 'content_types'); ?></span>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="radio" name="required" value="1">
                        <span class="description"><strong><?php _e('TRUE', 'content_types'); ?></strong></span>
                        <br />
                        <input type="radio" name="required" value="0" checked="checked">
                        <span class="description"><strong><?php _e('FALSE', 'content_types'); ?></strong></span>
                    </td>
                </tr>
            </table>
        </div>
        */ ?>
    </div>
    <br style="clear: left" />

    <p class="submit">
        <?php wp_nonce_field( 'submit_custom_field' ); ?>
        <input type="submit" class="button-primary" name="submit" value="Add Custom Field">
    </p>
    <br /><br /><br /><br />
</form>
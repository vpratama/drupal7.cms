<?php
/**
 * Implementation of hook_flag_default_flags().
 */
function wgs_products_comparison_flag_default_flags() {
// Exported flag: "Product comparison".
$flags['products_compare_flag'] = array (
  'entity_type' => 'node',
  'title' => 'Product comparison',
  'global' => '0',
  'types' => 
  array (
    0 => 'product',
  ),
  'flag_short' => 'Include in comparison',
  'flag_long' => '',
  'flag_message' => '',
  'unflag_short' => 'Exclude from comparison',
  'unflag_long' => '',
  'unflag_message' => '',
  'unflag_denied_text' => '',
  'link_type' => 'toggle',
  'weight' => 0,
  'show_on_form' => 0,
  'access_author' => '',
  'i18n' => 0,
  'module' => 'products_compare_flag',
  'locked' => 
  array (
    'name' => 'name',
  ),
  'api_version' => 3,
  'status' => false,
  'import_roles' => 
  array (
    'flag' => 
    array (
      0 => '2',
    ),
    'unflag' => 
    array (
      0 => '2',
    ),
  ),
  'show_in_links' => 
  array (
    'teaser' => true,
    'full' => true,
  ),
);
return $flags;

}
?>

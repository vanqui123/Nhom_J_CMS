
<?php

/**
 *
 * Creating a custom job search form for homepage
 * The [jobs] shortcode is will use search_location and search_keywords variables from the query string.
 *
 * @link https://wpjobmanager.com/document/tutorial-creating-custom-job-search-form/
 *
 * @package JobScout
 */
$find_a_job_link = get_option('job_manager_jobs_page_id', 0);
$post_slug       = get_post_field('post_name', $find_a_job_link);
$ed_job_category = get_option('job_manager_enable_categories');

if ($post_slug) {
  $action_page =  home_url('/' . $post_slug);
} else {
  $action_page =  home_url('/');
}
?>

<?php

function get_location_list()
{
  function get_jobs_count_with_meta($meta_key)
  {
    $query = new WP_Query(
      [
        'post_type'   => 'job_listing',
        'post_status' => ['publish', 'expired'],
        'fields'      => 'all',
        'meta_query'  => [
          [
            'key'     => $meta_key,
            'value'   => '[^[:space:]]',
            'compare' => 'REGEXP',
          ],
        ],
      ]
    );
    return $query->posts;
  }
  $ids = get_jobs_count_with_meta('_job_location');
  $locations = [];
  foreach ($ids as $key => $value) {
    $location = get_the_job_location($value);
    if (!in_array($location, $locations)) {
      $locations[] = $location;
    }
  }
  return $locations;
}

?>

<div class="custom-search-form">
  <form class="d-flex" method="GET" action="<?php echo esc_url($action_page) ?>">
    <div class="search_jobs d-flex w-100 px-4 py-3">
      <div class="w-100 d-flex bg-white">
        <label for="search_keywords" class="text-primary my-auto fs-4 mx-3 d-block">
          <i class="fa-solid fa-magnifying-glass"></i>
        </label>
        <input class="son-input rounded-0 border-0 text-secondary" type="text" id="search_keywords" name="search_keywords" placeholder="<?php esc_attr_e('Search for jobs, companies, skills', 'jobscout'); ?>">
      </div>
      <div class="w-50 ms-3 d-flex bg-white">
        <label for="search_location" class="text-primary my-auto fs-4 mx-3 d-block">
          <i class="fa-sharp fa-solid fa-location-dot"></i>
        </label>
        <select id="search_location" name="search_location" class="robo-search-category border-0 text-secondary son-input">
          <option value=""><?php _e('Anywhere', 'jobscout'); ?></option>
          <?php foreach (get_location_list() as $location) : ?>
            <option value="<?php echo esc_attr($location); ?>"><?php echo esc_html($location); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button for="submit-form" class="btn btn-primary ms-3 border-primary px-4 rounded-0 text-nowrap fw-bold">SEARCH JOB</button>
    </div>
  </form>
</div>
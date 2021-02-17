<?php return [
    'plugin' => [
        'name' => 'Onevago',
        'description' => '🛍️ Tour buying service.',
        'author' => 'Schtil',
    ],
    'field' => [
        'vendor_code' => 'Vendor code',
        'creator_id' => 'Creator User',
        'name' => 'Tour name',
        'description' => 'Tour description',
        'type_id' => 'Tour type',
        'location_id' => 'Location',
        'address' => 'Hotel Address',
        'cost' => 'Cost by one day',
        'details' => 'Details (json)',
        'start_date' => 'Starting Date',
        'end_date' => 'Ending Date',
    ],
    'menu' => [
        'tours' => 'Tour list',
    ],
    'permission' => [
        'tour' => 'Manage tour',
    ],
    'tour' => [
        'name' => 'tour',
        'list_title' => 'Tour list',
    ],
    'component' => [
        'tour_list_name' => 'Tour List',
        'tour_list_description' => 'Get tour list',
        'tour_page_name' => 'Tour Page',
        'tour_page_description' => 'Get tour page data',
    ],
];
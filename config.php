<?php

return [
    'production' => false,
    'baseUrl' => 'https://svenluijten.com',

    'collections' => [
    // Posts collection sorted by date and in descending order (latest post at the top)
        'posts' => [
            'sort' => '-date',
            'path' => '{filename}',
        ]
    ],

    // Number of collection items to show per page
    'perPage' => 10,

    // The name of the site
    'siteName' => 'Sven Luijten',

    // The description of the site. This is used in for the site's default metadata
    'siteDescription' => 'PHP / Laravel developer and maintainer of several open source packages',

    // The name of the site Author. Your name!
    'siteAuthor' => 'Sven',

    // Social media links/icons that are used in the footer, add as many as you like!
    'socials' => [
        'twitter' => [
            'link' => 'https://twitter.com/svenluijten',
            'icon' => 'fab fa-twitter',
            'label' => 'Twitter',
        ],
        'github' => [
            'link' => 'https://github.com/svenluijten',
            'icon' => 'fab fa-github',
            'label' => 'GitHub',
        ],
    ],

    // Google Analytics Tracking Id. For example, UA-123456789-1
    'gaTrackingId' => '',

     // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },

    'getExcerpt' => function ($page, $length = 225) {
        $content = $page->excerpt ?? $page->getContent();
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content), '<code>'
        );
        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },

    'readingTime' => function($post) {
        $mins = round(str_word_count(strip_tags($post)) / 200);
        return $mins . ' min read';
    },
];

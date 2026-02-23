<?php

return [
    'feeds' => [
        'main' => [
            'items' => 'App\Models\Post@getFeedItems',
            'url' => '/feed',
            'title' => 'My Blog Feed',
            'description' => 'Latest posts from my blog',
            'language' => 'en-US',
            'view' => 'feed', // Changed from 'feed::feed' to 'feed'
            'format' => 'atom',
        ],
    ],
];
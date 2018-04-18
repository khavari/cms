<?php

return [

    // site
    'url'                      => ['type' => 'url', 'group' => 'site', 'value' => null],
    'title'                    => ['type' => 'text', 'group' => 'site', 'value' => null],
    'brief'                    => ['type' => 'text', 'group' => 'site', 'value' => null],
    'description'              => ['type' => 'text', 'group' => 'site', 'value' => null],
    'keywords'                 => ['type' => 'text', 'group' => 'site', 'value' => null],
    'image'                    => ['type' => 'url', 'group' => 'site', 'value' => null],
    'logo'                     => ['type' => 'url', 'group' => 'site', 'value' => null],
    'favicon'                  => ['type' => 'url', 'group' => 'site', 'value' => null],
    'analytics'                => ['type' => 'text', 'group' => 'site', 'value' => null],
    'robots'                   => ['type' => 'text', 'group' => 'site', 'value' => 'index,follow'],
    'copyright'                => ['type' => 'text', 'group' => 'site', 'value' => null],
    'introduction'             => ['type' => 'editor', 'group' => 'site', 'value' => null],


    // social media
    'facebook'                 => ['type' => 'url', 'group' => 'social', 'value' => 'https://www.facebook.com/'],
    'twitter'                  => ['type' => 'url', 'group' => 'social', 'value' => 'https://www.twitter.com/'],
    'instagram'                => ['type' => 'url', 'group' => 'social', 'value' => 'https://www.instagram.com/'],
    'linkedin'                 => ['type' => 'url', 'group' => 'social', 'value' => null],
    'telegram'                 => ['type' => 'url', 'group' => 'social', 'value' => null],
    'google_plus'              => ['type' => 'url', 'group' => 'social', 'value' => null],
    'aparat'                   => ['type' => 'url', 'group' => 'social', 'value' => null],
    'youtube'                  => ['type' => 'url', 'group' => 'social', 'value' => null],
    'github'                   => ['type' => 'url', 'group' => 'social', 'value' => 'https://github.com/'],


    // admin
    'admin.title'              => ['type' => 'text', 'group' => 'admin', 'value' => 'پنل مدیریت'],
    'admin.copyright'          => ['type' => 'text', 'group' => 'admin', 'value' => 'گروه طراحی و برنامه نویسی عصرنت'],
    'admin.author'             => ['type' => 'text', 'group' => 'admin', 'value' => 'asrenet'],
    'admin.logo'               => ['type' => 'text', 'group' => 'admin', 'value' => '/assets/admin/img/logo.png'],
    'admin.link'               => ['type' => 'url', 'group' => 'admin', 'value' => 'http://www.asrenet.net'],
    'admin.favicon'            => ['type' => 'text', 'group' => 'admin', 'value' => '/assets/admin/img/favicon.png'],

    // email
    'email.username'           => ['type' => 'text', 'group' => 'email', 'value' => null],
    'email.password'           => ['type' => 'password', 'group' => 'email', 'value' => null],
    'email.port'               => ['type' => 'number', 'group' => 'email', 'value' => null],
    'email.host'               => ['type' => 'text', 'group' => 'email', 'value' => null],
    'email.from'               => ['type' => 'email', 'group' => 'email', 'value' => null],
    'email.to'                 => ['type' => 'email', 'group' => 'email', 'value' => null],
    'email.sender'             => ['type' => 'text', 'group' => 'email', 'value' => null],


    // contact us
    'contact.title'            => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'contact.body'             => ['type' => 'editor', 'group' => 'contact', 'value' => null],
    'contact.email'            => ['type' => 'email', 'group' => 'contact', 'value' => null],
    'contact.phone'            => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'contact.mobile'           => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'contact.postal'           => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'contact.address'          => ['type' => 'text', 'group' => 'contact', 'value' => null],

    // google map
    'map.title'                => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'map.latitude'             => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'map.longitude'            => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'map.longitude'            => ['type' => 'text', 'group' => 'contact', 'value' => null],
    'map.key'                  => ['type' => 'text', 'group' => 'contact', 'value' => null],


    // vibrant
    'color.fresh'              => ['type' => 'text', 'group' => 'layout', 'value' => 'default'],
    'color.bg_vibrant'         => ['type' => 'color', 'group' => 'layout', 'value' => '#a25bbf'],
    'color.bg_vibrant_hover'   => ['type' => 'color', 'group' => 'layout', 'value' => '#89569e'],
    'color.text_vibrant'       => ['type' => 'color', 'group' => 'layout', 'value' => '#ffffff'],
    'color.text_vibrant_hover' => ['type' => 'color', 'group' => 'layout', 'value' => '#ffffff'],
    'color.border_vibrant'     => ['type' => 'color', 'group' => 'layout', 'value' => '#ffffff'],

    // muted
    'color.bg_muted'           => ['type' => 'color', 'group' => 'layout', 'value' => '#373737'],
    'color.bg_muted_hover'     => ['type' => 'color', 'group' => 'layout', 'value' => '#373737'],
    'color.text_muted'         => ['type' => 'color', 'group' => 'layout', 'value' => '#ffffff'],
    'color.text_muted_hover'   => ['type' => 'color', 'group' => 'layout', 'value' => '#ffffff'],
    'color.border_muted'       => ['type' => 'color', 'group' => 'layout', 'value' => '#ffffff'],

    // dark
    'color.bg_dark'            => ['type' => 'color', 'group' => 'layout', 'value' => '#2a2a2a'],
    'color.bg_dark_hover'      => ['type' => 'color', 'group' => 'layout', 'value' => '#222222'],
    'color.text_dark'          => ['type' => 'color', 'group' => 'layout', 'value' => '#c0c0c0'],
    'color.text_dark_hover'    => ['type' => 'color', 'group' => 'layout', 'value' => '#ffffff'],
    'color.border_dark'        => ['type' => 'color', 'group' => 'layout', 'value' => '#414141'],

    // body
    'color.bg_body'            => ['type' => 'color', 'group' => 'layout', 'value' => '#fcfcfc'],
    'color.text_body_title'    => ['type' => 'color', 'group' => 'layout', 'value' => '#000000'],
    'color.text_body_content'  => ['type' => 'color', 'group' => 'layout', 'value' => '#000000'],


    // font
    'font.bold'                => ['type' => 'text', 'group' => 'fonts', 'value' => 'default'],
    'font.medium'              => ['type' => 'text', 'group' => 'fonts', 'value' => 'default'],
    'font.normal'              => ['type' => 'text', 'group' => 'fonts', 'value' => 'default'],
    'font.size'                => ['type' => 'number', 'group' => 'fonts', 'value' => '16'],

    //product
    'enable_cart'              => ['type' => 'number', 'group' => 'product', 'value' => '0'],
    'product_grid'             => [
        'type'  => 'text',
        'group' => 'product',
        'value' => 'col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 p-1 mb-0',
    ],
    'category_grid'            => [
        'type'  => 'text',
        'group' => 'product',
        'value' => 'col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 p-1 mb-0',
    ],
    'currency'                 => ['type' => 'text', 'group' => 'product', 'value' => 'تومان'],
    'products_per_page'        => ['type' => 'number', 'group' => 'product', 'value' => '16'],

];

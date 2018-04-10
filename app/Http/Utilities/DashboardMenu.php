<?php

namespace App\Http\Utilities;

use App\Feature;

class DashboardMenu
{

    protected $menus;

    public function __construct()
    {
        // $this->menus[] = $this->viewHomePage();
        $this->menus[] = $this->settings();

        $this->menus[] = $this->widgets();

        $this->menus[] = $this->users();

        $this->menus[] = $this->contents();

        if(env('PRODUCT',false)){
            $this->menus[] = $this->products();
        }

        $this->menus[] = $this->features();

        $this->menus[] = $this->contacts();

        //$this->menus[] = $this->payments();

        $this->menus[] = $this->files();


        $this->menus[] = $this->guide();
    }

    public function get()
    {
        return collect($this->menus);
    }

    public function viewHomePage()
    {
        return [
            'title' => __('admin.view_home_page'),
            'icon'  => 'fa-ravelry',
            'url'   => url('/'),
            'count' => __('125'),
        ];
    }

    public function settings()
    {
        return [
            'title'    => __('admin.manage_settings'),
            'icon'     => 'fa-wrench',
            'url'      => route('admin.settings.index'),
            'children' => [
                [
                    'title' => __('admin.all_settings'),
                    'icon'  => 'fa-cogs',
                    'url'   => route('admin.settings.index'),
                ],
                [
                    'title' => __('admin.site'),
                    'icon'  => 'fa-globe',
                    'url'   => route('admin.settings.edit', ['id' => 'site']),
                ],
                [
                    'title' => __('admin.social_media'),
                    'icon'  => 'fa-sitemap',
                    'url'   => route('admin.settings.edit', ['id' => 'social']),
                ],
                [
                    'title' => __('admin.email'),
                    'icon'  => 'fa-envelope-o',
                    'url'   => route('admin.settings.edit', ['id' => 'email']),
                ],
                [
                    'title' => __('admin.contact'),
                    'icon'  => 'fa-calculator',
                    'url'   => route('admin.settings.edit', ['id' => 'contact']),
                ],
                [
                    'title' => __('admin.layout'),
                    'icon'  => 'fa-paint-brush',
                    'url'   => route('admin.settings.edit', ['id' => 'layout']),
                ],
                [
                    'title' => __('admin.fonts'),
                    'icon'  => 'fa-paint-brush',
                    'url'   => route('admin.settings.edit', ['id' => 'fonts']),
                ],

                [
                    'title' => __('admin.products'),
                    'icon'  => 'fa-th-large',
                    'url'   => route('admin.settings.edit', ['id' => 'product']),
                ],

                [
                    'title' => __('admin.admin_panel'),
                    'icon'  => 'fa-key',
                    'url'   => route('admin.settings.edit', ['id' => 'admin']),
                ],

            ],
        ];
    }

    public function widgets()
    {
        return [
            'title'    => __('widgets.manage_widgets'),
            'icon'     => 'fa-windows',
            'url'      => route('admin.widgets.index'),
            'children' => [
                [
                    'title' => __('widgets.all_widgets'),
                    'icon'  => 'fa-power-off',
                    'url'   => route('admin.widgets.index'),
                ],
                [
                    'title' => __('widgets.home_page'),
                    'icon'  => 'fa-home',
                    'url'   => route('admin.widgets.show', ['widget' => 'home']),
                ],
            ],
        ];
    }

    public function users()
    {
        return [
            'title'    => __('admin.manage_users'),
            'icon'     => 'fa-users',
            'url'      => route('admin.users.index'),
            'children' => [
                [
                    'title' => __('admin.users'),
                    'icon'  => 'fa-users',
                    'url'   => route('admin.users.index'),
                ],
                [
                    'title' => __('admin.create_new_user'),
                    'icon'  => 'fa-user-plus',
                    'url'   => route('admin.users.create'),
                ],
                [
                    'title' => __('admin.roles'),
                    'icon'  => 'fa-apple',
                    'url'   => route('admin.roles.index'),
                ],
                [
                    'title' => __('admin.logins'),
                    'icon'  => 'fa-line-chart',
                    'url'   => route('admin.logins.index'),
                ],
            ],
        ];
    }

    public function contacts()
    {
        return [
            'title'    => __('admin.manage_contacts'),
            'icon'     => 'fa-envelope-o',
            'url'      => route('admin.contacts.index'),
            'children' => [
                [
                    'title' => __('admin.contacts'),
                    'icon'  => 'fa-envelope-o',
                    'url'   => route('admin.contacts.index'),
                ],
                [
                    'title' => __('admin.archived'),
                    'icon'  => 'fa-envelope-open',
                    'url'   => route('admin.contacts.index') . '?archived=true',
                ],
            ],
        ];
    }

    public function contents()
    {
        return [
            'title' => __('admin.manage_content'),
            'icon'  => 'fa-header',
            'url'   => url('/'),

            'children' => [
                [
                    'title' => __('admin.vocabularies'),
                    'icon'  => 'fa-th-large',
                    'url'   => route('admin.vocabularies.index'),
                ],
                [
                    'title' => __('admin.categories'),
                    'icon'  => 'fa-th-list',
                    'url'   => route('admin.categories.index'),
                ],
                [
                    'title' => __('admin.contents'),
                    'icon'  => ' fa-file-text-o',
                    'url'   => route('admin.contents.index'),
                ],
                [
                    'title' => __('admin.comments'),
                    'icon'  => ' fa-commenting-o',
                    'url'   => route('admin.comments.index'),
                ],
            ],
        ];
    }

    public function products()
    {
        return [
            'title' => __('admin.manage_', ['item' => __('admin.products')]),
            'icon'  => 'fa-th-large',
            'url'   => url('/'),

            'children' => [
                [
                    'title' => __('admin.categories'),
                    'icon'  => 'fa-sort-alpha-asc',
                    'url'   => route('admin.product_categories.index'),
                ],
                [
                    'title' => __('admin.products'),
                    'icon'  => 'fa-diamond',
                    'url'   => route('admin.products.index'),
                ],
                [
                    'title' => __('admin.comments'),
                    'icon'  => ' fa-commenting-o',
                    'url'   => route('admin.comments.index'),
                ],
            ],
        ];
    }

    public function features()
    {
        return [
            'title'    => __('admin.manage_features'),
            'icon'     => 'fa-cubes',
            'url'      => route('admin.features.index'),
            'children' => [
                [
                    'title' => __('admin.navbar'),
                    'icon'  => 'fa-navicon',
                    'url'   => route('admin.links.index', ['feature' => Feature::getId('navbar')]),
                ],
                [
                    'title' => __('admin.footer'),
                    'icon'  => 'fa-tasks',
                    'url'   => route('admin.links.index', ['feature' => Feature::getId('footer')]),
                ],
                [
                    'title' => __('admin.slider'),
                    'icon'  => 'fa-map-o',
                    'url'   => route('admin.links.index', ['feature' => Feature::getId('slider')]),
                ],
                [
                    'title' => __('admin.gallery'),
                    'icon'  => 'fa-object-ungroup',
                    'url'   => route('admin.links.index', ['feature' => Feature::getId('gallery')]),
                ],
                [
                    'title' => __('admin.customers'),
                    'icon'  => 'fa-th',
                    'url'   => route('admin.links.index', ['feature' => Feature::getId('customers')]),
                ],
                [
                    'title' => __('admin.parallax'),
                    'icon'  => 'fa-image',
                    'url'   => route('admin.links.index', ['feature' => Feature::getId('parallax')]),
                ],
                [
                    'title' => __('admin.faq'),
                    'icon'  => 'fa-question',
                    'url'   => route('admin.links.index', ['feature' => Feature::getId('faq')]),
                ],
            ],
        ];
    }

    public function payments()
    {
        return [
            'title' => __('admin.manage_payments'),
            'icon'  => 'fa-money',
            'url'   => route('admin.payments.index'),

            'children' => [
                [
                    'title' => __('admin.payments'),
                    'icon'  => 'fa-credit-card',
                    'url'   => route('admin.payments.index'),
                ],

            ],
        ];
    }

    public function files()
    {
        return [
            'title' => __('admin.manage_files'),
            'icon'  => 'fa-folder-open-o',
            'url'   => route('admin.files.index'),

            'children' => [
                [
                    'title' => __('admin.files'),
                    'icon'  => 'fa-file-o',
                    'url'   => route('admin.files.index'),
                ],
                [
                    'title' => __('admin.file_manager'),
                    'icon'  => 'fa-cloud-upload',
                    'url'   => route('elfinder.index'),
                ],
            ],
        ];
    }

    public function guide()
    {
        return [
            'title'  => __('admin.panel_guide'),
            'icon'   => 'fa-book',
            'url'    => 'http://www.asrenet.net',
            'target' => '_black',
        ];
    }

}

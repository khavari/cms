<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Content;
use App\Http\Requests\LinkRequest;
use App\Link;
use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{

    protected $icons;

    public function __construct()
    {
        $this->icons[] = 'fa-home';
        $this->icons[] = "fa-glass";
        $this->icons[] = 'fa-music';
        $this->icons[] = 'fa-search';
        $this->icons[] = 'fa-envelope-o';
        $this->icons[] = 'fa-heart';
        $this->icons[] = 'fa-star';
        $this->icons[] = 'fa-star-o';
        $this->icons[] = 'fa-user';
        $this->icons[] = 'fa-film';
        $this->icons[] = 'fa-th-large';
        $this->icons[] = 'fa-th';
        $this->icons[] = 'fa-th-list';
        $this->icons[] = 'fa-check';
        $this->icons[] = 'fa-times';
        $this->icons[] = 'fa-search-plus';
        $this->icons[] = 'fa-search-minus';
        $this->icons[] = 'fa-power-off';
        $this->icons[] = 'fa-signal';
        $this->icons[] = 'fa-cog';
        $this->icons[] = 'fa-trash-o';
        $this->icons[] = 'fa-file-o';
        $this->icons[] = 'fa-clock-o';
        $this->icons[] = 'fa-road';
        $this->icons[] = 'fa-download';
        $this->icons[] = 'fa-arrow-circle-o-down';
        $this->icons[] = 'fa-arrow-circle-o-up';
        $this->icons[] = 'fa-inbox';
        $this->icons[] = 'fa-play-circle-o';
        $this->icons[] = 'fa-repeat';
        $this->icons[] = 'fa-refresh';
        $this->icons[] = 'fa-list-alt';
        $this->icons[] = 'fa-lock';
        $this->icons[] = 'fa-flag';
        $this->icons[] = 'fa-headphones';
        $this->icons[] = 'fa-volume-off';
        $this->icons[] = 'fa-volume-down';
        $this->icons[] = 'fa-volume-up';
        $this->icons[] = 'fa-qrcode';
        $this->icons[] = 'fa-barcode';
        $this->icons[] = 'fa-tag';
        $this->icons[] = 'fa-tags';
        $this->icons[] = 'fa-book';
        $this->icons[] = 'fa-bookmark';
        $this->icons[] = 'fa-print';
        $this->icons[] = 'fa-camera';
        $this->icons[] = 'fa-font';
        $this->icons[] = 'fa-bold';
        $this->icons[] = 'fa-italic';
        $this->icons[] = 'fa-text-height';
        $this->icons[] = 'fa-text-width';
        $this->icons[] = 'fa-align-left';
        $this->icons[] = 'fa-align-center';
        $this->icons[] = 'fa-align-right';
        $this->icons[] = 'fa-align-justify';
        $this->icons[] = 'fa-list';
        $this->icons[] = 'fa-outdent';
        $this->icons[] = 'fa-indent';
        $this->icons[] = 'fa-video-camera';
        $this->icons[] = 'fa-picture-o';
        $this->icons[] = 'fa-pencil';
        $this->icons[] = 'fa-map-marker';
        $this->icons[] = 'fa-adjust';
        $this->icons[] = 'fa-tint';
        $this->icons[] = 'fa-pencil-square-o';
        $this->icons[] = 'fa-share-square-o';
        $this->icons[] = 'fa-check-square-o';
        $this->icons[] = 'fa-arrows';
        $this->icons[] = 'fa-step-backward';
        $this->icons[] = 'fa-fast-backward';
        $this->icons[] = 'fa-backward';
        $this->icons[] = 'fa-play';
        $this->icons[] = 'fa-pause';
        $this->icons[] = 'fa-stop';
        $this->icons[] = 'fa-forward';
        $this->icons[] = 'fa-fast-forward';
        $this->icons[] = 'fa-step-forward';
        $this->icons[] = 'fa-eject';
        $this->icons[] = 'fa-chevron-left';
        $this->icons[] = 'fa-chevron-right';
        $this->icons[] = 'fa-plus-circle';
        $this->icons[] = 'fa-minus-circle';
        $this->icons[] = 'fa-times-circle';
        $this->icons[] = 'fa-check-circle';
        $this->icons[] = 'fa-question-circle';
        $this->icons[] = 'fa-info-circle';
        $this->icons[] = 'fa-crosshairs';
        $this->icons[] = 'fa-times-circle-o';
        $this->icons[] = 'fa-check-circle-o';
        $this->icons[] = 'fa-ban';
        $this->icons[] = 'fa-arrow-left';
        $this->icons[] = 'fa-arrow-right';
        $this->icons[] = 'fa-arrow-up';
        $this->icons[] = 'fa-arrow-down';
        $this->icons[] = 'fa-share';
        $this->icons[] = 'fa-expand';
        $this->icons[] = 'fa-compress';
        $this->icons[] = 'fa-plus';
        $this->icons[] = 'fa-minus';
        $this->icons[] = 'fa-asterisk';
        $this->icons[] = 'fa-exclamation-circle';
        $this->icons[] = 'fa-gift';
        $this->icons[] = 'fa-leaf';
        $this->icons[] = 'fa-fire';
        $this->icons[] = 'fa-eye';
        $this->icons[] = 'fa-eye-slash';
        $this->icons[] = 'fa-exclamation-triangle';
        $this->icons[] = 'fa-plane';
        $this->icons[] = 'fa-calendar';
        $this->icons[] = 'fa-random';
        $this->icons[] = 'fa-comment';
        $this->icons[] = 'fa-magnet';
        $this->icons[] = 'fa-chevron-up';
        $this->icons[] = 'fa-chevron-down';
        $this->icons[] = 'fa-retweet';
        $this->icons[] = 'fa-shopping-cart';
        $this->icons[] = 'fa-folder';
        $this->icons[] = 'fa-folder-open';
        $this->icons[] = 'fa-arrows-v';
        $this->icons[] = 'fa-arrows-h';
        $this->icons[] = 'fa-bar-chart-o';
        $this->icons[] = 'fa-twitter-square';
        $this->icons[] = 'fa-facebook-square';
        $this->icons[] = 'fa-camera-retro';
        $this->icons[] = 'fa-key';
        $this->icons[] = 'fa-cogs';
        $this->icons[] = 'fa-comments';
        $this->icons[] = 'fa-thumbs-o-up';
        $this->icons[] = 'fa-thumbs-o-down';
        $this->icons[] = 'fa-star-half';
        $this->icons[] = 'fa-heart-o';
        $this->icons[] = 'fa-sign-out';
        $this->icons[] = 'fa-linkedin-square';
        $this->icons[] = 'fa-thumb-tack';
        $this->icons[] = 'fa-external-link';
        $this->icons[] = 'fa-sign-in';
        $this->icons[] = 'fa-trophy';
        $this->icons[] = 'fa-github-square';
        $this->icons[] = 'fa-upload';
        $this->icons[] = 'fa-lemon-o';
        $this->icons[] = 'fa-phone';
        $this->icons[] = 'fa-square-o';
        $this->icons[] = 'fa-bookmark-o';
        $this->icons[] = 'fa-phone-square';
        $this->icons[] = 'fa-twitter';
        $this->icons[] = 'fa-facebook';
        $this->icons[] = 'fa-github';
        $this->icons[] = 'fa-unlock';
        $this->icons[] = 'fa-credit-card';
        $this->icons[] = 'fa-rss';
        $this->icons[] = 'fa-hdd-o';
        $this->icons[] = 'fa-bullhorn';
        $this->icons[] = 'fa-bell';
        $this->icons[] = 'fa-certificate';
        $this->icons[] = 'fa-hand-o-right';
        $this->icons[] = 'fa-hand-o-left';
        $this->icons[] = 'fa-hand-o-up';
        $this->icons[] = 'fa-hand-o-down';
        $this->icons[] = 'fa-arrow-circle-left';
        $this->icons[] = 'fa-arrow-circle-right';
        $this->icons[] = 'fa-arrow-circle-up';
        $this->icons[] = 'fa-arrow-circle-down';
        $this->icons[] = 'fa-globe';
        $this->icons[] = 'fa-wrench';
        $this->icons[] = 'fa-tasks';
        $this->icons[] = 'fa-filter';
        $this->icons[] = 'fa-briefcase';
        $this->icons[] = 'fa-arrows-alt';
        $this->icons[] = 'fa-users';
        $this->icons[] = 'fa-link';
        $this->icons[] = 'fa-cloud';
        $this->icons[] = 'fa-flask';
        $this->icons[] = 'fa-scissors';
        $this->icons[] = 'fa-files-o';
        $this->icons[] = 'fa-paperclip';
        $this->icons[] = 'fa-floppy-o';
        $this->icons[] = 'fa-square';
        $this->icons[] = 'fa-bars';
        $this->icons[] = 'fa-list-ul';
        $this->icons[] = 'fa-list-ol';
        $this->icons[] = 'fa-strikethrough';
        $this->icons[] = 'fa-underline';
        $this->icons[] = 'fa-table';
        $this->icons[] = 'fa-magic';
        $this->icons[] = 'fa-truck';
        $this->icons[] = 'fa-pinterest';
        $this->icons[] = 'fa-pinterest-square';
        $this->icons[] = 'fa-google-plus-square';
        $this->icons[] = 'fa-google-plus';
        $this->icons[] = 'fa-money';
        $this->icons[] = 'fa-caret-down';
        $this->icons[] = 'fa-caret-up';
        $this->icons[] = 'fa-caret-left';
        $this->icons[] = 'fa-caret-right';
        $this->icons[] = 'fa-columns';
        $this->icons[] = 'fa-sort';
        $this->icons[] = 'fa-sort-asc';
        $this->icons[] = 'fa-sort-desc';
        $this->icons[] = 'fa-envelope';
        $this->icons[] = 'fa-linkedin';
        $this->icons[] = 'fa-undo';
        $this->icons[] = 'fa-gavel';
        $this->icons[] = 'fa-tachometer';
        $this->icons[] = 'fa-comment-o';
        $this->icons[] = 'fa-comments-o';
        $this->icons[] = 'fa-bolt';
        $this->icons[] = 'fa-sitemap';
        $this->icons[] = 'fa-umbrella';
        $this->icons[] = 'fa-clipboard';
        $this->icons[] = 'fa-lightbulb-o';
        $this->icons[] = 'fa-exchange';
        $this->icons[] = 'fa-cloud-download';
        $this->icons[] = 'fa-cloud-upload';
        $this->icons[] = 'fa-user-md';
        $this->icons[] = 'fa-stethoscope';
        $this->icons[] = 'fa-suitcase';
        $this->icons[] = 'fa-bell-o';
        $this->icons[] = 'fa-coffee';
        $this->icons[] = 'fa-cutlery';
        $this->icons[] = 'fa-file-text-o';
        $this->icons[] = 'fa-building-o';
        $this->icons[] = 'fa-hospital-o';
        $this->icons[] = 'fa-ambulance';
        $this->icons[] = 'fa-medkit';
        $this->icons[] = 'fa-fighter-jet';
        $this->icons[] = 'fa-beer';
        $this->icons[] = 'fa-h-square';
        $this->icons[] = 'fa-plus-square';
        $this->icons[] = 'fa-angle-double-left';
        $this->icons[] = 'fa-angle-double-right';
        $this->icons[] = 'fa-angle-double-up';
        $this->icons[] = 'fa-angle-double-down';
        $this->icons[] = 'fa-angle-left';
        $this->icons[] = 'fa-angle-right';
        $this->icons[] = 'fa-angle-up';
        $this->icons[] = 'fa-angle-down';
        $this->icons[] = 'fa-desktop';
        $this->icons[] = 'fa-laptop';
        $this->icons[] = 'fa-tablet';
        $this->icons[] = 'fa-mobile';
        $this->icons[] = 'fa-circle-o';
        $this->icons[] = 'fa-quote-left';
        $this->icons[] = 'fa-quote-right';
        $this->icons[] = 'fa-spinner';
        $this->icons[] = 'fa-circle';
        $this->icons[] = 'fa-reply';
        $this->icons[] = 'fa-github-alt';
        $this->icons[] = 'fa-folder-o';
        $this->icons[] = 'fa-folder-open-o';
        $this->icons[] = 'fa-smile-o';
        $this->icons[] = 'fa-frown-o';
        $this->icons[] = 'fa-meh-o';
        $this->icons[] = 'fa-gamepad';
        $this->icons[] = 'fa-keyboard-o';
        $this->icons[] = 'fa-flag-o';
        $this->icons[] = 'fa-flag-checkered';
        $this->icons[] = 'fa-terminal';
        $this->icons[] = 'fa-code';
        $this->icons[] = 'fa-reply-all';
        $this->icons[] = 'fa-mail-reply-all';
        $this->icons[] = 'fa-star-half-o';
        $this->icons[] = 'fa-location-arrow';
        $this->icons[] = 'fa-crop';
        $this->icons[] = 'fa-code-fork';
        $this->icons[] = 'fa-chain-broken';
        $this->icons[] = 'fa-question';
        $this->icons[] = 'fa-info';
        $this->icons[] = 'fa-exclamation';
        $this->icons[] = 'fa-superscript';
        $this->icons[] = 'fa-subscript';
        $this->icons[] = 'fa-eraser';
        $this->icons[] = 'fa-puzzle-piece';
        $this->icons[] = 'fa-microphone';
        $this->icons[] = 'fa-microphone-slash';
        $this->icons[] = 'fa-shield';
        $this->icons[] = 'fa-calendar-o';
        $this->icons[] = 'fa-fire-extinguisher';
        $this->icons[] = 'fa-rocket';
        $this->icons[] = 'fa-maxcdn';
        $this->icons[] = 'fa-chevron-circle-left';
        $this->icons[] = 'fa-chevron-circle-right';
        $this->icons[] = 'fa-chevron-circle-up';
        $this->icons[] = 'fa-chevron-circle-down';
        $this->icons[] = 'fa-html5';
        $this->icons[] = 'fa-css3';
        $this->icons[] = 'fa-anchor';
        $this->icons[] = 'fa-unlock-alt';
        $this->icons[] = 'fa-bullseye';
        $this->icons[] = 'fa-ellipsis-h';
        $this->icons[] = 'fa-ellipsis-v';
        $this->icons[] = 'fa-rss-square';
        $this->icons[] = 'fa-play-circle';
        $this->icons[] = 'fa-ticket';
        $this->icons[] = 'fa-minus-square';
        $this->icons[] = 'fa-minus-square-o';
        $this->icons[] = 'fa-level-up';
        $this->icons[] = 'fa-level-down';
        $this->icons[] = 'fa-check-square';
        $this->icons[] = 'fa-pencil-square';
        $this->icons[] = 'fa-external-link-square';
        $this->icons[] = 'fa-share-square';
        $this->icons[] = 'fa-compass';
        $this->icons[] = 'fa-caret-square-o-down';
        $this->icons[] = 'fa-caret-square-o-up';
        $this->icons[] = 'fa-caret-square-o-right';
        $this->icons[] = 'fa-eur';
        $this->icons[] = 'fa-gbp';
        $this->icons[] = 'fa-usd';
        $this->icons[] = 'fa-inr';
        $this->icons[] = 'fa-jpy';
        $this->icons[] = 'fa-rub';
        $this->icons[] = 'fa-krw';
        $this->icons[] = 'fa-btc';
        $this->icons[] = 'fa-file';
        $this->icons[] = 'fa-file-text';
        $this->icons[] = 'fa-sort-alpha-asc';
        $this->icons[] = 'fa-sort-alpha-desc';
        $this->icons[] = 'fa-sort-amount-asc';
        $this->icons[] = 'fa-sort-amount-desc';
        $this->icons[] = 'fa-sort-numeric-asc';
        $this->icons[] = 'fa-sort-numeric-desc';
        $this->icons[] = 'fa-thumbs-up';
        $this->icons[] = 'fa-thumbs-down';
        $this->icons[] = 'fa-youtube-square';
        $this->icons[] = 'fa-youtube';
        $this->icons[] = 'fa-xing';
        $this->icons[] = 'fa-xing-square';
        $this->icons[] = 'fa-youtube-play';
        $this->icons[] = 'fa-dropbox';
        $this->icons[] = 'fa-stack-overflow';
        $this->icons[] = 'fa-instagram';
        $this->icons[] = 'fa-flickr';
        $this->icons[] = 'fa-adn';
        $this->icons[] = 'fa-bitbucket';
        $this->icons[] = 'fa-bitbucket-square';
        $this->icons[] = 'fa-tumblr';
        $this->icons[] = 'fa-tumblr-square';
        $this->icons[] = 'fa-long-arrow-down';
        $this->icons[] = 'fa-long-arrow-up';
        $this->icons[] = 'fa-long-arrow-left';
        $this->icons[] = 'fa-long-arrow-right';
        $this->icons[] = 'fa-apple';
        $this->icons[] = 'fa-windows';
        $this->icons[] = 'fa-android';
        $this->icons[] = 'fa-linux';
        $this->icons[] = 'fa-dribbble';
        $this->icons[] = 'fa-skype';
        $this->icons[] = 'fa-foursquare';
        $this->icons[] = 'fa-trello';
        $this->icons[] = 'fa-female';
        $this->icons[] = 'fa-male';
        $this->icons[] = 'fa-gittip';
        $this->icons[] = 'fa-sun-o';
        $this->icons[] = 'fa-moon-o';
        $this->icons[] = 'fa-archive';
        $this->icons[] = 'fa-bug';
        $this->icons[] = 'fa-vk';
        $this->icons[] = 'fa-weibo';
        $this->icons[] = 'fa-renren';
        $this->icons[] = 'fa-pagelines';
        $this->icons[] = 'fa-stack-exchange';
        $this->icons[] = 'fa-arrow-circle-o-right';
        $this->icons[] = 'fa-arrow-circle-o-left';
        $this->icons[] = 'fa-caret-square-o-left';
        $this->icons[] = 'fa-dot-circle-o';
        $this->icons[] = 'fa-wheelchair';
        $this->icons[] = 'fa-vimeo-square';
        $this->icons[] = 'fa-try';
        $this->icons[] = 'fa-plus-square-o';
    }

    public function index(Feature $feature)
    {
        $links = $feature->links()->lang()->orderBy('order')->get();
        $slug = $feature->slug;
        $icons = $this->icons;
        $urls = $this->address();

        return view('admin.features.' . $slug . '.index', compact('feature', 'links', 'icons', 'urls'));
    }

    public function create()
    {

    }

    public function store(Feature $feature, LinkRequest $request)
    {
        if ($request->parent_id == 0) {
            $request->merge(['parent_id' => null]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file("file");
            $directory = 'uploads/features/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
            $request->merge(['image' => $file_path]);
        }

        $feature->links()->create($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.created_success'));

        return back();
    }

    public function show(Feature $feature, Link $link)
    {
        return view('admin.features.show', compact('feature', 'link'));
    }

    public function edit(Feature $feature, Link $link)
    {
        // toggle user 0 or 1
        if (request('active') && request('active') === 'toggle') {
            if ($link->active === 1) {
                $link->update(['active' => 0]);
            } else {
                $link->update(['active' => 1]);
            }

            return back()->with('success', __('messages.toggled_success'));
        }

        $links = Link::lang()->whereNotIn('id', [$link->getKey()])->get();
        $icons = $this->icons;
        $slug = $feature->slug;
        $urls = $this->address();

        return view('admin.features.' . $slug . '.edit', compact('feature', 'links', 'link', 'icons', 'urls'));

    }

    public function update(Request $request, Feature $feature, Link $link)
    {

        if ($request->parent_id == 0) {
            $request->merge(['parent_id' => null]);
        }

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($link->image);
            $file = $request->file("file");
            $directory = 'uploads/features/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
            $request->merge(['image' => $file_path]);
        }

        $link->update($request->except(['file', '_token', '_method']));
        session()->flash('success', __('messages.updated_success'));

        return redirect()->route('admin.links.index', ['id' => $feature->id]);
    }

    public function destroy(Feature $feature, Link $link)
    {
        if ($link->hasChildren()) {
            session()->flash('error', __('messages.not_allowe_delete_child'));
        } else {
            session()->flash('success', __('messages.deleted_success'));
            Storage::disk('public')->delete($link->image);
            $link->delete();

        }

        return back();
    }


    public function address()
    {

        $categories = collect(Category::lang()->get())->map(function ($category) {
            return [
                'title' => $category->title,
                'slug'  => $category->slug,
                'url'   => app()->getLocale() . '/category/' . $category->slug,
            ];
        });

        $user = [
            [
                'title' => 'login',
                'slug'  => 'login',
                'url'   => app()->getLocale() . '/user/profile',
            ],
            [
                'title' => 'register',
                'slug'  => 'register',
                'url'   => app()->getLocale() . '/register',
            ],
            [
                'title' => 'profile',
                'slug'  => 'profile',
                'url'   => app()->getLocale() . '/user/profile',
            ],
        ];

        $contents = collect(Content::lang()->get())->map(function ($content) {
            return [
                'title' => $content->title,
                'slug'  => $content->slug,
                'url'   => app()->getLocale() . '/content/' . $content->slug,
            ];
        })->concat($categories)->concat($user);

        return $contents;
    }


}

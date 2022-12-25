<?php

namespace App\Widgets;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\User;
use TCG\Voyager\Widgets\BaseDimmer;

class ArticleDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //$count = Voyager::model('User')->count();
        $count = Article::count();
        //$string = trans_choice('voyager::dimmer.user', $count);
        $string = "文章數量:" . $count;

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            // 'title'  => "{$count} {$string}",
            'title' => "{$string}",
            // 'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'text' => "目前文章為" . $count . "篇",
            'button' => [
                // 'text' => __('voyager::dimmer.user_link_text'),
                'text' => "顯示文章",
                //articles路由還沒有設
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/05.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
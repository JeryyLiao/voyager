<?php

namespace App\Widgets;

use App\Models\Cgy;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\User;
use TCG\Voyager\Widgets\BaseDimmer;

class CgyDimmer extends BaseDimmer
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
        $count = Cgy::count();
        //$string = trans_choice('voyager::dimmer.user', $count);
        $string = "分類數量:" . $count;

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-person',
            // 'title'  => "{$count} {$string}",
            'title' => "{$string}",
            // 'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'text' => "目前分類為" . $count . "個",
            'button' => [
                // 'text' => __('voyager::dimmer.user_link_text'),
                'text' => "顯示分類",
                //cgies路由還沒有設
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

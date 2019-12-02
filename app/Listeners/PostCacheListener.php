<?php

namespace App\Listeners;

use App\Models\Post;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class PostCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        Cache::forget('posts'); // first delete old cache

         Cache::rememberForever('posts',  function () { // find and store data to cache for lifetime
            return Post::with('user', 'category')->orderBy('created_at', 'desc')->get();
        });

    }
}

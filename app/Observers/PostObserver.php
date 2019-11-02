<?php

namespace App\Observers;

use App\Jobs\SendPostUpdatedJob;
use App\Post;
use App\Services\PostService;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @param  PostService $postService
     * @return void
     */
    public function updated(Post $post,PostService $postService)
    {
        foreach ($post->authors as $author) {
            $author->words_count = $postService->calculateAuthorWords($author);
            $author->save();
        }

        dispatch(new SendPostUpdatedJob($post));

    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}

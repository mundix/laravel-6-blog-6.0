<?php


namespace App\Services;


class PostService
{
    public function calculateAuthorWords($author)
    {
        $words_count = 0;
        foreach($author->posts as $posts)
        {
            $words_count += str_word_count($posts->description);
        }
        return $words_count;
    }
}

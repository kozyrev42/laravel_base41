<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
/*
 *
 * New post db write action
 *
*/

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
//        dd($data);
        // отдаём данные в сервис для дальнейшей обработки
        $this->service->update($post, $data);

        return redirect()->route('posts.show', $post->id);
    }
}

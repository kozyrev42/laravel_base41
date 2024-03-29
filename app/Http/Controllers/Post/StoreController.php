<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;

/*
 *
 * New post db write action
 *
*/

class StoreController extends BaseController
{
    public function __invoke(UpdateRequest $request)
    {
        // валидируем входяшие данные используя UpdateRequest
        $data = $request->validated();

        // отдаём данные в сервис для дальнейшей обработки
        $this->service->store($data);

        return redirect()->route('post.index');
    }
}

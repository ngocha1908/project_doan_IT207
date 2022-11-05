<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return Comment::class;
    }

    public function getCommentByProduct($id)
    {
        return $this->model->with('user')
            ->where('product_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('app.comment'));
    }
}

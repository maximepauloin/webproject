<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getPaginate($n)
    {
        return $this->post->with('user')
            ->orderBy('posts.created_at', 'desc')
            ->paginate($n);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    private function save(Post $post, Array $inputs)
    {
        $post->title = $inputs['title'];
        $post->resolv = $inputs['resolv'];
        $post->content = $inputs['content'];

        $post->save();
    }

    public function getById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function store($inputs)
    {
        $this->post->create($inputs);
    }

    public function destroy($id)
    {
        $this->post->findOrFail($id)->delete();
    }


}
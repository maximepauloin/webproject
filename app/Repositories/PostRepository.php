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

    private function save(Post $post, Array $inputs)
    {
        $post->title = $inputs['title'];
        $post->resolv= $inputs['resolv'];
        $post->content = $inputs['content'];

        $post->save();
    }

    /*private function save(Post $post)
    {
        $post->resolv = "1";

        $post->save();
    }*/

    public function getPaginate($n)
    {
        return $this->post->with('user')
            ->orderBy('posts.created_at', 'desc')
            ->paginate($n);
    }

    public function getById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    /*public function resolv($id)
    {
        $this->save($this->getById($id));
    }*/

    public function store($inputs)
    {
        $this->post->create($inputs);
    }

    public function destroy($id)
    {
        $this->post->findOrFail($id)->delete();
    }

}
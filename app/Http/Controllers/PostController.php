<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    protected $postRepository;

    protected $nbrPerPage = 100;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getPaginate($this->nbrPerPage);
        $links = $posts->render();

        return view('posts.liste', compact('posts', 'links'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function show($id)
    {
        $posts = $this->postRepository->getById($id);

        return view('view', compact('posts'));
    }

    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->postRepository->update($id, $request->all());

        return redirect('post')->withOk("The post '" . $request->input('title') . "' has been modified.");
    }

    public function store(Request $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $this->postRepository->store($inputs);

        return redirect(route('post.index'));
    }

    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->back();
    }

}
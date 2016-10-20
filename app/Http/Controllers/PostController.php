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

    public function show($id) //display the information of a memo
    {
        $posts = $this->postRepository->getById($id);

        return view('view',  compact('posts'));
    }

    public function edit($id) //Send the form for the modification
    {
        $post = $this->postRepository->getById($id);
        return view('edit',  compact('post'));
    }

    public function update(Request $request, $id) //Modification of a memo
    {
        $this->postRepository->update($id, $request->all());

        return redirect('post')->withOk("The post '" . $request->input('title') . "' has been modified.");
    }

    /*public function resolv($id) //Modification of a memo
    {
        $this->postRepository->resolv($id);

        return redirect(route('post.index'));
    }*/

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
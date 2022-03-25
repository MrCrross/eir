<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::orderBy('name')->get();
        return response()->view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);
            Post::create([
                'name'=>$request->name
            ]);
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Должность успешно добавлено');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('posts.index')->with('danger', 'Произошла ошибка' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::where('id',$id)->orderBy('name')->first();
        return response()->view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->orderBy('name')->first();
        return response()->view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);
            Post::where('id',$id)->update([
                'name'=>$request->name
            ]);
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Должность успешно изменена');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('posts.index')->with('danger', 'Произошла ошибка' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return DB::transaction(function () use ($id){
            Post::find($id)->delete();
            return redirect()->route('posts.index')
                ->with('success','Должность удалена успешно');
        });
    }
}

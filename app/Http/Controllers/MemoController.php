<?php

namespace App\Http\Controllers;

use App\Memo;
use App\Repositories\MemoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MemoController extends Controller
{
    /**
     * @var MemoRepository
     */
    protected $memoRepository;

    /**
     * MemoController constructor.
     * @param MemoRepository $memoRepository
     */
    public function __construct(MemoRepository $memoRepository)
    {
        $this->middleware('auth');
        $this->memoRepository = $memoRepository;
    }

    /**
     * Display a listing of the resource.
     * 一覧ページ
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('memos.index', $this->memoRepository->memoResource());
    }

    /**
     * @param Request $request
     * @return mixed
     * キーワード検索
     */
    public function search(Request $request)
    {
        return view('memos.index', $this->memoRepository->memoSearchResource())
            ->with('search', $request->input('search', ''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 作成ページ
     */
    public function create()
    {
        return view('memos.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // バリデーション 入力チェック
        $this->validate($request, [
            'title' => 'required|string|max:25',
            'contents' => 'required|string',
            'favorite' => 'nullable|boolean',
        ]);

        $memo = new Memo();
        $memo->title = $request->input('title');
        $memo->contents = $request->input('contents');
        $memo->favorite = $request->input('favorite', false);
        $memo->save();
        return redirect()->route('memos.index')->with('status', '作成しました。');
    }

    /**
     * Display the specified resource.
     * @param Memo $memo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 詳細ページ
     */
    public function show(Memo $memo)
    {
        return view('memos.detail', compact('memo'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Memo $memo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 編集
     */
    public function edit(Memo $memo)
    {
        return view('memos.edit', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Memo $memo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Memo $memo)
    {
        $this->validate($request, [
            'title' => 'required|string|max:25',
            'contents' => 'required|string',
            'favorite' => 'nullable|boolean',
        ]);

        $memo->title = $request->input('title');
        $memo->contents = $request->input('contents');
        $memo->favorite = $request->input('favorite', false);
        $memo->update();

        return redirect()->route('memos.detail', compact('memo'))->with('status', '編集しました。');
    }

    /**
     * Remove the specified resource from storage.
     * @param Memo $memo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * 削除
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();
        return redirect()->route('memos.index')->with('status', '削除しました。');
    }
}

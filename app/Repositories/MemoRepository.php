<?php

namespace App\Repositories;

use App\Memo;

class MemoRepository
{
    /**
     * 一覧表示
     * @return array
     */
    public function memoResource()
    {
        $memos = Memo::paginate(5);
        return compact('memos');
    }

    /**
     * 検索
     * @return array
     */
    public function memoSearchResource()
    {
        $memos = Memo::filter()->paginate(5);
        return compact('memos');
    }
}
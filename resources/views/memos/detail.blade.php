@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $memo->title }}</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ $memo->contents }}
                    </div>
                    <div class="card-footer">
                        {{--☆★お気に入り☆★--}}
                        @if ($memo->favorite === 0)
                            ☆　
                        @else
                            ★　
                        @endif

                        登録日：
                        @if ($memo->updated_at == null)
                            {{ $memo->created_at->format('Y年m月d日') }}
                        @else
                            {{ $memo->updated_at->format('Y年m月d日') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('memos.edit', compact('memo')) }}" class="btn btn-outline-dark btn-lg btn-block">
                    編集
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg btn-block">
                    Homeへ戻る
                </a>
                <a href="{{ route('memos.index') }}" class="btn btn-outline-secondary btn-lg btn-block">
                    戻る
                </a>
                <br>
                <form action="{{ route('memos.delete', compact('memo')) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-outline-danger btn-lg btn-block">
                        削除
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

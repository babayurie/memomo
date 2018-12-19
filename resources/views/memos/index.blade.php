@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{--↓↓検索フォーム↓↓--}}
                <div class="col-sm-12" style="padding:20px 0; padding-left:0px;">
                    <form class="form-inline" action="{{url('/search')}}">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="検索" size="50">
                        </div>
                        <input type="submit" value="検索" class="btn btn-info btn-outline-secondary">
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">Memomo　一覧ページ</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($memos as $memo)
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3>
                                        <a href="{{ route('memos.detail', compact('memo')) }}">
                                            {{ $memo->title }}
                                        </a>
                                    </h3>
                                    <p>
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
                                    </p>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                        <div class="paginate">
                            {{ $memos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg btn-block">
                    戻る
                </a>
            </div>
        </div>
    </div>
@endsection

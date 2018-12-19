@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        memo編集
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> エラー</h4>
                                        @foreach ($errors->all() as $error)
                                            <span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}<br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('memos.update', compact('memo')) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">title</label>
                                <input type="text" name="title" value="{{ $memo->title }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">memo</label>
                                <textarea class="form-control" name="contents">{{ $memo->contents }}</textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="favorite" value="1"
                                       class="form-check-input" @if ($memo->favorite) checked @endif>
                                <label class="form-check-label" for="exampleCheck1">お気に入り</label>
                            </div>
                            <button type="submit" class="btn btn-outline-warning btn-lg btn-block">編集</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('memos.detail', compact('memo')) }}" class="btn btn-outline-secondary btn-lg btn-block">
                    戻る
                </a>
            </div>
        </div>
    </div>
@endsection

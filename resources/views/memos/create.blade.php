@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        作成ページ
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
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                        <h4><i class="icon fa fa-ban"></i> エラー</h4>
                                        @foreach ($errors->all() as $error)
                                            <span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}<br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('memos.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">memo title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">memo</label>
                                <textarea class="form-control" name="contents">{{ old('contents') }}</textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="favorite" value="1" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1">お気に入り</label>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary btn-mg btn-block">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg btn-block">
                    Homeへ戻る
                </a>
            </div>
        </div>
    </div>
@endsection

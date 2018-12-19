@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Memomoメニュー</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('memos.index') }}" class="btn btn-secondary btn-lg btn-block">
                            記事一覧
                        </a>
                        <a href="{{ route('memos.create') }}" class="btn btn-secondary btn-lg btn-block">
                            記事作成
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

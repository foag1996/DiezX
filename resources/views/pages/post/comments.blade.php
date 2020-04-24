@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <b class="float-left">
                        {{ $comment->user->username }}
                    </b>
                    <div class="float-right">
                        <label for="editComment">
                            Edit Comment
                        </label>
                    </div>
                </div>
                <div class="card-body">
                	<form method="POST" action="{{ route('comments.update', $comment) }}">
    				@csrf
    				@method('PUT')
                    <textarea class="form-control" id="editComment" name="body" rows="3">{{ old('body', $comment->body)}}</textarea>
                    <br>
                    <button class="btn btn-success btn-block">
                        Editar
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

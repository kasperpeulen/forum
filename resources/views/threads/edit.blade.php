<?php /** @var \App\Thread $thread */ ?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Thread</div>
                    <div class="panel-body">
                        <form action="{{$thread->path()}}" method="POST">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" name="title" id="title" value="{{$thread->title}}">
                            </div>

                            <div class="form-group">
                                <label for="body" class="control-label">Body: </label>
                                <textarea class="form-control" id="body" name="body" rows="8">{{$thread->body}}</textarea>
                            </div>
                            @include('layouts.errors')
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

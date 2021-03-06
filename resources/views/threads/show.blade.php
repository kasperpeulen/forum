@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$thread->title}} by <a href="#">{{$thread->user->name}}</a>
                        <div class="pull-right">
                            @can('update', $thread)
                            <a href="{{$thread->path() . '/edit'}}" class="btn btn-default btn-xs">Edit</a>
                            @endcan

                            @can('delete', $thread)
                            <form action="{{$thread->path()}}" method="POST" style="display:inline;">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-default btn-xs">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>

                    <div class="panel-body">
                        {{$thread->body}}

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <replies thread="{{$thread->id}}"></replies>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(auth()->check())
                    <form @submit.prevent="addReply('{{$thread->path() . '/replies'}}')" method="post" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea cols="5" v-model="body" class="form-control" name="body" id="body" placeholder="Have something to say?"></textarea>
                        </div>
                        @include('layouts.errors')
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                @else
                    <div class="text-center">
                        Please <a href="{{route('login')}}">sign in</a> to participate.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

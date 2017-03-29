@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Create Thread</div>

                    <div class="panel-body">
                        <form action="/threads" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="body" class="control-label">Body: </label>
                                    <textarea class="form-control" id="body" name="body" rows="8" required>{{old('body')}}</textarea>
                            </div>
                            @include('layouts.errors')
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

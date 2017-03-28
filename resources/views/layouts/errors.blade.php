@if(count($errors) > 0)
    <div class="form-group">
        <div class="alert alert-danger alert-important">
            <strong>Errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
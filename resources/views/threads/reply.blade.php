<div class="panel panel-default">
    <div class="panel-heading">
        <a href="/users/{{$reply->user->id}}">
            {{$reply->user->name}}
        </a>
        said {{$reply->created_at->diffForHumans()}} ... </div>


    <div class="panel-body">
        <article>
            <div class="body">{{$reply->body}}</div>
        </article>
    </div>
</div>
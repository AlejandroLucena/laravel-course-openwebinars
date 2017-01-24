<h1>View create posts</h1>

{!! Form::open(['url' => 'post/store']) !!}
<label>Title</label>
{!! Form::text('title', '') !!}<br>
<label>Body</label>
{!! Form::textarea('body', '') !!}
<br>
{!! Form::submit('Save post') !!}
{!! Form::close() !!}
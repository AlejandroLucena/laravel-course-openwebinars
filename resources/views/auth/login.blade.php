<h1>Login screen</h1>

{!! Form::open(['url' => 'auth/login']) !!}
<label>Email</label>
{!! Form::email('email', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'email']) !!}
<br>
<label>Password</label>
{!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'password']) !!}
<br>
<label>
    <input name="remember" type="checkbox">
    Remember me
</label>
{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
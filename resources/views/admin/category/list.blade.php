<h1>Hello i am category page</h1>

Role - {{ Auth::user()->role }}

<form action="{{ route('logout') }}" method="post">
    @csrf
    <input type="submit" value="log out">
</form>

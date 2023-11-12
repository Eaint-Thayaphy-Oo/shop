<h1>User Home Page</h1>

Role - {{ Auth::user()->role }}

<form action="{{ route('logout') }}" method="post">
    @csrf
    <input type="submit" value="log out">
</form>

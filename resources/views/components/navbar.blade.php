<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar">
    <div class="logo">Teamalya</div>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/admin/products') }}">Products</a></li>
        <li><a  href="{{ route('team') }}">Our Team</a> </li>
    <li><a href="{{ url('/contact') }}">Contact Us</a></li>

</li>


        @guest
            <!-- If the user is not logged in -->
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Sign Up</a></li>
        @else
            <!-- If the user is logged in -->
            <!-- <li><a href="{{ url('/dashboard') }}">Dashboard</a></li> -->
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>

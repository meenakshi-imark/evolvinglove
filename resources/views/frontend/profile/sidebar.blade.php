<?php 
$routes = Route::current()->getName(); 
?>
<aside>
            <ul>
                <li>
                    <a href="{{ route('my-account') }}" class="{{ $routes== 'my-account' ? 'active' : '' }} ">
                        <img src="{{ asset('images/Evolving Love Icon - My Profile.png')}}" alt="Evolving Love Icon - My Profile">
                        My Profiles
                    </a>
                </li>
                <li>
                    <a href="{{ route('programs') }}" class="{{ $routes== 'programs' ? 'active' : '' }} ">
                        <img src="{{ asset('images/Evolving Love Icon - My Products.png')}}" alt="Evolving Love Icon - My Products">
                        My Courses
                    </a>
                </li>
                <li>
                    <a href="{{ url('my-account') }}" class="{{ $routes== 'myaccount' ? 'active' : '' }} ">
                        <img src="{{ asset('images/EvolvingLoveIcon.png')}}" alt="Evolving Love Icon - Community">
                        My Account
                    </a>
                </li>
                <li>
                    <a href="{{ route('get-support') }}" class="{{ $routes== 'get-support' ? 'active' : '' }} ">
                        <img src="{{ asset('images/Evolving Love Icon - Get Support.png')}}" alt="Evolving Love Icon - Get Support">
                        Get Support
                    </a>
                </li>
                <li>
                    <a href="{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <img src="{{ asset('images/Evolving Love Icon - Logout (Grey).png')}}" alt="Evolving Love Icon - Logout (Grey) - My Profile">
                        Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>
            </ul>
        </aside>
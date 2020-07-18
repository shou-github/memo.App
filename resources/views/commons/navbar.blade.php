<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark  p-5" style="background: linear-gradient(to top, rgb(255, 172, 17), rgb(255, 231, 17));">
       
        @if (Auth::check())
        <h1><i class="fas fa-edit"></i><?php $user = Auth::user(); ?>{{ $user->name }}'s page</h1>
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
            <li onclick="return Logout_check()">{!! link_to_route('logout.get', 'Logout', [], ['class' => 'btn btn-lg btn-secondary']) !!}</li>
        </ul>
        @else    
        
          <p style="font-size:40px; font-weight:bold; color:black;"><i class="far fa-edit"></i>memo.App</p>  
        @endif         
    </nav>
</header>
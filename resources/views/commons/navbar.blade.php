<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to top, rgb(255, 172, 17), rgb(255, 231, 17));">
@if (Auth::check())

          <p style="font-size:30px; font-weight:bold;"><i class="fas fa-edit"></i><?php $user = Auth::user(); ?>{{ $user->name }}'s page</p>  
    
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                          
                    @if($user->image == null)
                      <img style="border-radius:50%; border-width: 4px; border-style: solid; border-color:skyblue; width:70px; height:70px;" src="{{ Gravatar::get($user->email) }}" alt="">
                    @else
                      <img style="border-radius:50%; border-width: 4px; border-style: solid; border-color:skyblue;  width:70px; height:70px;" src="{{ Storage::disk('s3')->url($user->image) }}">
                    @endif
                  </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item" style="text-align: center;">
                  <form style="display:flex;" method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="image">
                  </li>
                  <li class="dropdown-divider"></li>
                    <li class="dropdown-item">
                                      
                        <div class="form-submit" style="text-align: center;">
                          <button class="btn" style="background-color:blue; color:white;　text-align: center;" type="submit">Change image</button>
                      </div>
                  </form>
                  </li>
                    <li class="dropdown-divider"></li>
                      {{-- ログアウトへのリンク --}}
                      <li class="dropdown-item" onclick="return Logout_check()" style="text-align: center;">
                        {!! link_to_route('logout.get', 'Logout', [], ['class' => 'btn btn-secondary']) !!}
                      </li>
            </ul>
            </ul>
        @else

          <a class="navbar-brand" style="font-size:30px; font-weight:bold; color:black;" href="/"><i class="far fa-edit"></i>memo.app</a>  
    
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">

            </ul>
        @endif 
  </nav>
    <li><time style="font-size:19px;font-weight:bold; color:black;-webkit-text-stroke: 1px white;"></time></li>

</header>



<script>
      window.addEventListener("load",function(){
        var ele=document.getElementsByTagName("time")[0];
        setInterval(function(){
          //現在時刻のDateオブジェクトを生成
          var date = new Date();
          ele.innerHTML=date;
      },100);
      },false)
</script>
    
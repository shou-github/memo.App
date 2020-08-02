<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to top, rgb(255, 172, 17), rgb(255, 231, 17));">
@if (Auth::check())

          <p style="font-size:30px; font-weight:bold;"><i class="fas fa-edit"></i><?php $user = Auth::user(); ?>{{ $user->name }}'s page</p>  
    
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
              
          <form style="display:flex;" method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file"  name="image" id="img">
            
            <div class="form-submit">
              <button class="btn" style="background-color:blue; color:white; margin-right:50px;" type="submit">Edit</button>
            </div>
          </form>
           @if($user->image == null)

            <img style="border-radius:100%; width:70px; height:70px; margin-right:30px;" src="{{ Gravatar::get($user->email) }}" alt="">
        
        @else
        <img style="border-radius:100%; width:70px; height:70px; margin-right:30px;" src="{{ Storage::disk('s3')->url($user->image) }}">

        @endif
            <div onclick="return Logout_check()">
              {!! link_to_route('logout.get', 'Logout', [], ['class' => 'btn btn-lg btn-secondary']) !!}
            </div>
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
    
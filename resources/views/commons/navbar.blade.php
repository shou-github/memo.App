<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark  p-4" style="background: linear-gradient(to top, rgb(255, 172, 17), rgb(255, 231, 17));">
          <p style="font-size:40px; font-weight:bold;"><i class="far fa-edit"></i>memo.App</p>  
    
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li><time style="font-weight:bold;"></time></li>
            </ul>
    </nav>
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
    
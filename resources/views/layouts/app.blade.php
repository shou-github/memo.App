<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>memo.App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="shortcut icon" href="{{ secure_asset('favicon.ico') }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="JavaScript" type="text/JavaScript">
            
            function Delete_check(){
                let checked = confirm("Can I delete it?");
                if (checked == true) {
                    return true;
            } else {
                    return false;
            }
        }
            function Logout_check(){
                let checked = confirm("Can I logout it?");
                if (checked == true) {
                    return true;
            } else {
                    return false;
            }
        }
        </script>

    </head>
@if (Auth::check())
    <body style="background:url(sky.jpg); center no-repeat; background-size: cover;">
@else
    <body style="background:url(water.jpg); center no-repeat; background-size: cover;">
@endif

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container">
        
            
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
       
    <script>
           (function(document) {
    '       use strict';

        var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }

        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function(input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
            })(Array.prototype);
        
            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    LightTableFilter.init();
                }
            });
        
        })(document);
           
           

            let changeColorBtn = document.getElementsByClassName('chgColor');
            let textarea = document.getElementById('content');
            for (let i = 0; i < changeColorBtn.length; i++) {
                changeColorBtn[i].addEventListener('click', function () {
                    let color = this.value;
                    textarea.style.color = color;
                });
            }
            

            function Clipboard() {
		        var copyTarget = document.getElementById("content");
		        copyTarget.select();
	            document.execCommand("Copy");
		    }

            function ShowLength( str ) {
	            str=str.replace(/\n/g, ""); 
                document.getElementById("inputlength").innerHTML = ""+ str.length ;
             }
             
             
            
 
        button1.addEventListener("click", () => {
          if (!window.speechSynthesis) return;
          let u = new SpeechSynthesisUtterance(content.value);
          u.lang = "en";
          speechSynthesis.speak(u);
        });
        
        button2.addEventListener("click", () => {
          if (!window.speechSynthesis) return;
          let u = new SpeechSynthesisUtterance(content.value);
          u.lang = "ja";
          speechSynthesis.speak(u);
        });
        button3.addEventListener("click", () => {
          if (!window.speechSynthesis) return;
          speechSynthesis.cancel();
        });
        
        
        
        Resources

            
            
        
       </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

    </body>
</html>
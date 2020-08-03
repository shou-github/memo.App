<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>memo.app</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        
        <!--favicon変更-->
        <link rel="shortcut icon" href="{{ secure_asset('favicon.ico') }}">
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="JavaScript" type="text/JavaScript">
            
            // 削除する前の確認機能
            function Delete_check(){
                let checked = confirm("delete?");
                if (checked == true) {
                    return true;
            } else {
                    return false;
            }
            
        }
            
            function Logout_check(){
                let checked = confirm("logout?");
                if (checked == true) {
                    return true;
            } else {
                    return false;
            }
        }
        
        $('#change').on('click', function() {  
            !alert('このスクリプトを実行しますか？'); 
        return false;  
        });  
        </script>
    </head>
     
            <body style="background-image:url({{ asset('star.jpg') }}); center no-repeat; background-size: cover;">
       

       
        @include('commons.navbar')

        <div class="container">
        
            
            @include('commons.error_messages')

            @yield('content')
        </div>
       
    <script>
    
        // table検索機能
        
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
            
            // textarea内の文字を選択する機能
            function Clipboard() {
		        var copyTarget = document.getElementById("content");
		        copyTarget.select();
	            document.execCommand("Copy");
		    }
            // textareaの文字数表示
            function ShowLength( str ) {
	            str=str.replace(/\n/g, ""); 
                document.getElementById("inputlength").innerHTML = ""+ str.length ;
             }
             
             
            
        // 音声読み上げ機能
        
        // 英語
        button1.addEventListener("click", () => {
          if (!window.speechSynthesis) return;
          let u = new SpeechSynthesisUtterance(content.value);
          u.lang = "en";
          speechSynthesis.speak(u);
        });
        
        // 日本語
        button2.addEventListener("click", () => {
          if (!window.speechSynthesis) return;
          let u = new SpeechSynthesisUtterance(content.value);
          u.lang = "ja";
          speechSynthesis.speak(u);
        });
        
        // 読み上げ中止
        button3.addEventListener("click", () => {
          if (!window.speechSynthesis) return;
          speechSynthesis.cancel();
        });
        
        
        
        
       </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
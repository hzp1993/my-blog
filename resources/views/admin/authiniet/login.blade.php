<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>草根码农 越努力 越幸运 - 登录</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ URL::asset(__CSS__ . 'bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'font-awesome.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'login.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__ADMIN__ . 'css/admin.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script type="text/javascript" src="{{ URL::asset(__JS__ . 'jquery.min.js') }}"></script>
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>
    <style type="text/css">
        .tips{ display: block; width: 100%; height: 30px; line-height: 30px; color: #ff0000; font-weight: 700; text-align: center; margin-top: 10px;}
    </style>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="javascript:;" data-url="{{ '/admin/do_login' }}" id="forms" >
                    <h2 class="no-margins">博客登录：</h2>
                    <input type="text" class="form-control uname" name="username" placeholder="用户名" />
                    <input type="password" class="form-control pword m-b" name="password" placeholder="密码" />
                    <button class="btn btn-success btn-block" onclick="Form_login('#forms')">登录</button>
                    <span class="tips"></span>
                </form>
                
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 随便玩玩咯
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    function Form_login(e){
        $.ajax({
            type : 'POST',
            url  : $(e).data('url'),
            data : $(e).serialize(),
            dataType : 'json',
            success : function(data){
                if(data.status === 403){
                    tips(data.msg);
                    return false;
                }
                if(data.status === 200){
                    tips(data.msg);
                    setTimeout(function(){
                        location.href = data.url;
                    } , 2000);
                }
            }, 
            error : function(data){
                if(data.status === 422) {
                    $.each(data.responseJSON , function (key , value){
                        $('[name=' + key + ']').focus();
                        tips(value);
                        return false;
                    });
                }
            }
        })
    }

    function tips(msg){
        if(!msg) return false;
        $('.tips').html(msg);
    }
</script>
</html>

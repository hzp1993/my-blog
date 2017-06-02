<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Jeck 博客- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="{{ URL::asset(__CSS__ . 'bootstrap.min.css?v=3.3.6') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'style.css?v=4.1.0') }}" rel="stylesheet">
    <link href="{{ URL::asset(__JS__ . 'plugins/justTools/just-tips.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'plugins/chosen/chosen.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__CSS__ . 'plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset(__ADMIN__ . 'css/admin.css') }}" rel="stylesheet">
    @yield('style')
</head>

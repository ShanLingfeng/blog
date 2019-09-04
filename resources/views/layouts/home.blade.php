<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('resources/views/home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/m.css')}}" rel="stylesheet">
    <script src="{{asset('resources/views/home/js/jquery.min.js')}}" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('resources/views/home/js/modernizr.js')}}"></script>
    <![endif]-->
    <script src="{{asset('resources/views/home/js/page.js')}}"></script>
</head>
<body>
<header>
    <div id="mnav">
        <div class="logo"><a href="{{url('/')}}">单凌峰个人博客</a></div>
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="starlist">
            @foreach($navs as $k=>$v)
            <li><a href="{{$v->navs_url}}">{{$v->navs_name}}</a></li>
            @endforeach
            {{--<li><a href="about.html">关于我</a></li>--}}
            {{--<li><a href="share.html">模板分享</a></li>--}}
            {{--<li><a href="share.html">模板分享</a></li>--}}
            {{--<li><a href="list.html">学无止境</a></li>--}}
            {{--<li><a href="info.html">慢生活</a></li>--}}
            {{--<li><a href="shareinfo.html">模板内容页</a></li>--}}
            {{--<li><a href="gbook.html">留言</a></li>--}}

        </ul>
    </div>
    <script>
        window.onload = function ()
        {
            var oH2 = document.getElementById("mnavh");
            var oUl = document.getElementById("starlist");
            oH2.onclick = function ()
            {
                var style = oUl.style;
                style.display = style.display == "block" ? "none" : "block";
                oH2.className = style.display == "block" ? "open" : ""
            }
        }
    </script>
</header>
@yield('content')
<footer>
    <p>Design by <a href="/">单凌峰个人博客</a> <a href="/"></a></p>
</footer>
</body>
</html>


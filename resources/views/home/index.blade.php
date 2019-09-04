@extends('layouts.home')
@section('info')
    <title>首页_单凌峰个人博客网站</title>
    <meta name="keywords" content="个人博客,单凌峰个人博客" />
    <meta name="description" content="单凌峰个人博客，是一个站在巨人肩膀开发的网站！" />
@endsection
@section('content')
    <div class="line46"></div>
    <article>
        <div class="pics">
            <ul>
                @foreach($hot as $h)
                <li><i><a href="{{url('a/'.$h->art_id)}}"><img src="{{url($h->art_thumb)}}" style="width:30%;height:155px;"></a></i><span>{{$h->art_title}}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="blank"></div>
        <div class="leftbox">
            <div class="tuijian">
                <h2 class="hometitle"><span><a href="/">
                            {{--模板分享</a><a href="/">学无止境</a><a href="/">慢生活</a><a href="/">热门标签</a>--}}
                    </span>特别推荐</h2>
                <ul>
                    @foreach($data as $v)
                    <li>
                        <div class="tpic"><img src="{{url($v->art_thumb)}}" style="width:208px;height:102px;"></div>
                        <b>{{$v->title}}</b><span>{{$v->art_description}}</span><a href="{{url('a/'.$v->art_id)}}" class="readmore">阅读原文</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="newblogs">
                <h2 class="hometitle">最新文章</h2>
                {{--<ul id="list" style="display:none;">--}}
                <ul id="list">
                    @foreach($news as $n)
                    <li>
                        <h3 class="blogtitle"><a href="{{url('a/'.$n->art_id)}}" target="_blank" >{{$n->art_title}}</a></h3>
                        <div class="bloginfo">
                            <span class="blogpic"><a href="{{url('a/'.$n->art_id)}}" title=""><img src="{{url($n->art_thumb)}}"  style="width: 225px;height: 100px;"></a></span>
                            <div style="color: #888;overflow: hidden;text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    padding-top: 10px;
    font-size: 14px;">{!! $n->art_content !!}</div>
                        </div>
                        <div class="autor"><span class="lm f_l"><a href="/">单凌峰个人博客</a></span><span class="dtime f_l">{{ date( "Y-m-d", $n->art_time)}}</span><span class="viewnum f_l">浏览（<a href="/">{{$n->art_view}}</a>）</span>
                            {{--<span class="pingl f_l">喜欢（<a href="/">30</a>）</span>--}}
                            <span class="f_r"><a href="/" class="more">阅读原文</a></span></div>
                    </li>
                    @endforeach
                </ul>
                <ul id="list2">
                </ul>
                <script src="js/page2.js"></script>
            </div>
        </div>
        <div class="rightbox">
            <div class="aboutme">
                <h2 class="ab_title">关于我</h2>
                <div class="avatar"><img src="http://localhost/blog/resources/views/home/images/slf.jpg" /></div>
                <div class="ab_con">
                    <p>网名：天狼</p>
                    <p>职业：PHP开发工程师 </p>
                    <p>籍贯：安徽省-蚌埠市</p>
                    <p>邮箱：2603232721@qq.com</p>
                </div>
            </div>
            <div class="blank"></div>
            {{--<div class="search">--}}
                {{--<form action="/e/search/index.php" method="post" name="searchform" id="searchform">--}}
                    {{--<input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">--}}
                    {{--<input name="show" value="title" type="hidden">--}}
                    {{--<input name="tempid" value="1" type="hidden">--}}
                    {{--<input name="tbname" value="news" type="hidden">--}}
                    {{--<input name="Submit" class="input_submit" value="搜索" type="submit">--}}
                {{--</form>--}}
            {{--</div>--}}
            <div class="paihang">
                <h2 class="ab_title"><a href="/">点击排行</a></h2>
                <ul>
                    @foreach($hot2 as $h)
                    <li><b><a href="{{url('a/'.$h->art_id)}}" target="_blank">{{$h->art_title}}</a></b>
                        <p><i><img src="{{$h->art_thumb}}" style="width: 102px;height: 92px;"></i>{{$n->art_description}}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="links">
                <h2 class="ab_title">友情链接</h2>
                <ul>
                    @foreach($links as $l)
                    <li><a href="{{url($l->link_url)}}">{{$l->link_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="weixin">
                <h2 class="ab_title">微信关注</h2>
                <ul>
                    <img src="http://localhost/blog/resources/views/home/images/slf_wx.png">
                </ul>
            </div>
        </div>
    </article>
@endsection
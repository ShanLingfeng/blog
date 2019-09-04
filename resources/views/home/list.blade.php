@extends('layouts.home')
@section('info')
    <title>{{$field->cate_title}}_单凌峰个人博客 </title>
    <meta name="keywords" content="{{$field->cate_keywords}}" />
    <meta name="description" content="{{$field->cate_description}}" />
@endsection
@section('content')
    <div class="line46"></div>
    <article>
        <div class="leftbox">
            <div class="newblogs">
                <h2 class="hometitle">
                    {{--<span><a href="/jstt/bj/">心得笔记</a><a href="/jstt/css3/">CSS3|Html5</a><a href="/jstt/web/">网站建设</a></span>--}}
                   {{$field->cate_title}}</h2>
                <ul>
                    @foreach($data as $d)
                    <li>
                        <h3 class="blogtitle"><a href="{{url('a/'.$d->art_id)}}" target="_blank" >{{$d->art_title}}</a></h3>
                        <div class="bloginfo"><span class="blogpic"><a href="/" title=""><img src="{{url($d->art_thumb)}}"  /></a></span>
                            <div style="color: #888;overflow: hidden;text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    padding-top: 10px;
    font-size: 14px;">{!! $d->art_content !!}</div>
                        </div>
                        <div class="autor"><span class="lm f_l"><a href="{{url('/')}}">{{$d->art_editor}}</a></span><span class="dtime f_l">{{ date( "Y-m-d", $d->art_time)}}</span><span class="viewnum f_l">浏览（<a href="/">{{$d->art_view}}</a>）</span>
                            {{--<span class="pingl f_l">评论（<a href="/">30</a>）</span>--}}
                            <span class="f_r"><a href="{{url('a/'.$d->art_id)}}" class="more">阅读原文>></a></span></div>
                    </li>
                    @endforeach
                </ul>
                <style>
                    .pagination li{
                        float: left;
                        padding:5px;
                        border: #888;
                    }
                </style>
                <div class="page_list">
                   {{$data->links()}}
                </div>
            </div>
        </div>
        <div class="rightbox">
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
                <h2 class="ab_title"><a href="/">本栏推荐</a></h2>
                <ul>
                    @foreach($love as $l)
                        <li><b><a href="{{url('a/'.$l->art_id)}}" target="_blank">{{$l->art_title}}</a></b>
                            <p><i><img src="{{'../'.$l->art_thumb}}" style="width: 102px;height: 92px;"></i>{{$l->art_description}}</p>
                        </li>
                    @endforeach

                </ul>
                {{--<div class="ad"><img src="images/ad300x100.jpg"></div>--}}
            </div>
            <div class="paihang">
                <h2 class="ab_title"><a href="/">点击排行</a></h2>
                <ul>
                    @foreach($order as $r)
                        <li><b><a href="{{url('a/'.$r->art_id)}}" target="_blank">{{$r->art_title}}</a></b>
                            <p><i><img src="{{'../'.$r->art_thumb}}" style="width: 102px;height: 92px;"></i>{{$r->art_description}}</p>
                        </li>
                    @endforeach


                </ul>
                {{--<div class="ad"><img src="images/ad01.jpg"></div>--}}
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

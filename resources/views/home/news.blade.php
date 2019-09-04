@extends('layouts.home')
@section('info')
    <title>{{$field->art_title}}_单凌峰个人博客</title>
    <meta name="keywords" content="{{$field->art_tag}}" />
    <meta name="description" content="{{$field->art_description}}" />
@endsection
@section('content')
    <div class="line46"></div>
    <div class="blank"></div>
    <article>
        <div class="leftbox">
            <div class="infos">
                <div class="newsview">
                    <h2 class="intitle">您现在的位置是：<a href="{{url('/')}}">网站首页</a>&nbsp;&gt;&nbsp;<a href="{{url('cate/'.$cate->cate_id)}}">{{$cate->_title}}</a></h2>
                    <h3 class="news_title">{{$field->art_title}}</h3>
                    <div class="news_author"><span class="au01">{{$field->art_editor}}</span><span class="au02">{{date('Y-m-d',$field->art_time)}}</span><span class="au03">共<b>{{$field->art_view}}</b>浏览</span></div>
                    <div class="tags"><a href="/" target="_blank">{{$field->art_tag}}</a></div>
                    <div class="news_about"><strong>简介</strong>{{$field->art_description}}</div>
                    <div class="news_infos">
                        {!! $field->art_content !!}
                    </div>
                </div>
                {{--<div class="share">--}}
                    {{--<p class="diggit"><a href="JavaScript:makeRequest('/e/public/digg/?classid=3&amp;id=19&amp;dotop=1&amp;doajax=1&amp;ajaxarea=diggnum','EchoReturnedText','GET','');"> 很赞哦！ </a>(<b id="diggnum"><script type="text/javascript" src="/e/public/ViewClick/?classid=2&amp;id=20&amp;down=5"></script>13</b>)</p>--}}
                    {{--<p class="dasbox"><a href="javascript:void(0)" onclick="dashangToggle()" class="dashang" title="打赏，支持一下">打赏本站</a></p>--}}
                    {{--<div class="hide_box" style="display: none;"></div>--}}
                    {{--<div class="shang_box" style="display: none;"> <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭">关闭</a>--}}
                        {{--<div class="shang_tit">--}}
                            {{--<p>感谢您的支持，我会继续努力的!</p>--}}
                        {{--</div>--}}
                        {{--<div class="shang_payimg"> <img src="images/alipayimg.jpg" alt="扫码支持" title="扫一扫"> </div>--}}
                        {{--<div class="pay_explain">扫码打赏，你说多少就多少</div>--}}
                        {{--<div class="shang_payselect">--}}
                            {{--<div class="pay_item checked" data-id="alipay"> <span class="radiobox"></span> <span class="pay_logo"><img src="images/alipay.jpg" alt="支付宝"></span> </div>--}}
                            {{--<div class="pay_item" data-id="weipay"> <span class="radiobox"></span> <span class="pay_logo"><img src="images/wechat.jpg" alt="微信"></span> </div>--}}
                        {{--</div>--}}
                        {{--<script type="text/javascript">--}}
                            {{--$(function(){--}}
                                {{--$(".pay_item").click(function(){--}}
                                    {{--$(this).addClass('checked').siblings('.pay_item').removeClass('checked');--}}
                                    {{--var dataid=$(this).attr('data-id');--}}
                                    {{--$(".shang_payimg img").attr("src","images/"+dataid+"img.jpg");--}}
                                    {{--$("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");--}}
                                {{--});--}}
                            {{--});--}}
                            {{--function dashangToggle(){--}}
                                {{--$(".hide_box").fadeToggle();--}}
                                {{--$(".shang_box").fadeToggle();--}}
                            {{--}--}}
                        {{--</script>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!--share end-->
                <div class="zsm"><p>打赏本站，你说多少就多少</p><img src="images/zsm.jpg"></div>
            </div>
            <div class="nextinfo">
                <p>上一篇：
                    @if($article['pre'])
                    <a href="{{url('a/'.$article['pre']->art_id)}}" >{{$article['pre']->art_title}}</a>
                        @else
                        <span>无</span>
                    @endif
                </p>
                <p>下一篇：
                    @if($article['next'])
                        <a href="{{url('a/'.$article['next']->art_id)}}" >{{$article['next']->art_title}}</a>
                    @else
                        <span>无</span>
                    @endif
                </p>
            </div>
            <div class="otherlink">
                <h2>相关文章</h2>
                <ul>
                    @foreach($data as $d)
                        <li><a href="{{url('a/'.$d->art_id)}}" title="{{$d->art_title}}">{{$d->art_title}}</a></li>
                    @endforeach
                </ul>
            </div>
            {{--<div class="news_pl">--}}
                {{--<h2>文章评论</h2>--}}
                {{--<ul>--}}
                {{--</ul>--}}
            {{--</div>--}}
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

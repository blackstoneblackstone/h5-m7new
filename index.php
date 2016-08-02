<?php
$wxParams = curlGet("http://www.wexue.top/m7/weixinjs.php?url=" . base64_encode('http://www.wexue.top' . $_SERVER["REQUEST_URI"]));
function curlGet($url, $method = 'get', $data = '')
{
    $ch = curl_init();
    $header = "Accept-Charset: utf-8";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $temp = curl_exec($ch);
    return $temp;
}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>大兴人择偶标准大揭秘</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'/>-->
    <script type="text/javascript">
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth / 640;
        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            // andriod 2.3
            if (version > 2.3) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
                // andriod 2.3以上
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
            // 其他系统
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>

    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/index.css"/>

</head>

<body>

<div id="loadDiv">
    <div class="logo">

    </div>
    <div class="loading_bj">
        <div class="load-1">
        </div>
        <div class="load-2"></div>
        <span id="loginnum" class="fh b f24"></span>
    </div>
    <div class="loading_txt">
        <p class="syp_1 f24 sywz">有人说我<br>看脸风调雨顺,看胸颗粒无收</p>
        <p class="syp_2 f24 sywz">这到底是个看脸的世界，<br>还是看胸的社会呢?</p>
        <p class="syp_3 f24 sywz">让5000名高品位的大兴人<br><strong>为你揭秘</strong></p>
    </div>
</div>
<audio id="a1" src="media/m7.mp3" preload="auto"></audio>
<div id="btn-a1">
    <canvas id="audio-canvas" style="height: 50px;width: 640px;"></canvas>
    <!--<p class="kais" style="display:none;">开始</p>-->
    <!--<p class="2 animated rotateOut infinite">结束</p>-->
</div>
<div class="zb" style="display:none;">
    <p> 坐标: (beta=<span id="beta" class="value">null</span>, gamma=<span id="gamma" class="value">null</span>,
        alpha=<span id="alpha" class="value">null</span>,</p>
    <p>滚动背景值=<span id="lefts">null</span>,屏幕宽=<span id="bjk">null</span>,移动屏幕比=<span id="pmb">null</span>,开关=<span
            id="open">null</span>,</p>
</div>
<script src="js/jquery-1.8.2.min.js"></script>
<script>
//    var audio = document.getElementById('a1');
//    $('#btn-a1').on('click', function (ev) {
//        if (audio.paused) {
//            audio.play();
//            $(".kais").stop().fadeOut(0);
//            $(".2").stop().fadeIn(0);
//        } else {
//            audio.pause();
//            $(".2").stop().fadeOut(0);
//            $(".kais").stop().fadeIn(0);
//        }
//    });
//    $(document).one('touchstart', function () {
//        audio.play();
//    });

var numid = "#loginnum";
var totaljidu=0;
var time=null;
var start=0;/*晃动控制开关*/
function aa(loadingnum2,num) {
    if(totaljidu>=100)
    {
        clearInterval(time);
        return;
    }
    if (loadingnum2 < num) {
        clearInterval(time);
        time= setInterval(function () {
            loadingnum2++;
            totaljidu=loadingnum2;
            if (loadingnum2>=100)
            {
                $(numid).html("加载完毕");
            }
            else
            {
                $(numid).html(loadingnum2 + "%");

            }

            if(loadingnum2>=num)
            {
                clearInterval(time);
                return;
            }

        }, 10)
    }
}
//图片预加载
function loadImages(sources, callback) {
    var count = 0,
            images = {},
            imgNum = 0;
    for (src in sources) {
        imgNum++;
    }
    //数组长度
    var listlength=sources.length;
    //完成数量
    var loadingnum=0;
    var nextloadingnum=0;
    //完成一个加载数量
    var unum= parseInt(100/listlength)+1;
//alert(unum);
    var timer=null;
    for (src in sources) {
        images[src] = new Image();
        images[src].onload = function () {

            nextloadingnum += unum;
            if (nextloadingnum <= 100) {

                aa(loadingnum, nextloadingnum);
            }
            else {
                aa(loadingnum, 100);
                callback(images);
                return ;
            }

            if (++count >= imgNum) {
                callback(images);
            }

            loadingnum=nextloadingnum;
        }
        images[src].src = sources[src];
    }
}

loadImages([
            'images/avator-dx.png',
            'images/avator-jr.png',
            'images/bg3.png',
            'images/bottom_l01.gif',
            'images/bottom_r01.gif',
            'images/by.png',
            'images/cv.png',
            'images/gs.gif',
            'images/kanlian.png',
            'images/kanxiong.png',
            'images/load.gif',
            'images/logo.png',
            'images/mj.png',
            'images/nei_fh.png',
            'images/p2-1.png',
            'images/p2-2.png',
            'images/p3-2.png',
            'images/p3-t.png',
            'images/p4-1.png',
            'images/p4-2.png',
            'images/p5-2-t1.png',
            'images/p5-2-t2.png',
            'images/p5-2bg.png',
            'images/p5-3-t1.png',
            'images/p5-3-t2.png',
            'images/player-button.png',
            'images/player-button2.png',
            'images/sz.png',
            'images/title-1.png',
            'images/tp.png',
            'images/xt1.png',
            'images/xx-t1.png',
            'images/xxm.png',
            'images/xxt.png',
            'images/xz-t2.png',
            'images/zy.png'
        ],
        function() {
            $(numid).fadeOut(1000);
            setTimeout(function () {
                $("#loadDiv").stop().delay(500).fadeOut(1000);
                $(".bj_box").show();


                // $(".tankuang").stop().delay(4300).fadeIn(0);

                function yourFunction(){
                    $(".tankuang").show();
                    // setTimeout(yourFunction1,1500);
                }
                setTimeout(yourFunction,3500);

                // start=1;
            },6000);


        });



</script>

<script src="js/jquery.easing.1.3.js"></script>
<script src="js/index.js"></script>


<!-- 弹框 -->
<div class="tankuang"
     style="position:fixed; width:100%; height:100%; background:url('images/zy.png') center center no-repeat rgba(0,0,0,0.8); z-index:9999; top:0px; left:0px; display:none;">

</div>
<div class="bj_box" style="display:none;">
    <div class="bj">

        <div class="page1">
            <div class="page1_1">
                A型血:只要刺激
            </div>
            <img src="images/xxm.png" class="p1-m1 animated bounce infinite">
            <img src="images/xxt.png" class="p1-m2 ">
        </div>
        <div class="page2">
            <div class="page2_1">
                狮子座:我喜欢我自己
            </div>
            <img src="images/xx-t1.png" class="p2-m1">
            <img src="images/tp.png" class="p2-m2">
            <img src="images/sz.png" class="p2-m3 animated shake infinite ">
            <img src="images/cv.png" class="p2-m4">
            <img src="images/xz-t2.png" class="p2-m5">
            <img src="images/by.png" class="p2-m6 animated shake infinite ">
            <img src="images/mj.png" class="p2-m7 animated shake infinite ">

        </div>
        <div class="page3">
            <div class="page3_1">
                身高各不同,择偶差异大
            </div>
            <div class="page3_2">
                <div class="page3_21 p_bg">
                    <span class="page3_21_t">男</span>
                    <div class="page3_211"></div>
                    <div class="page3_212"></div>
                    <div class="page3_213"></div>
                    <div class="page3_214"></div>
                </div>
                <div class="page3_22">
                    <div class="page3_221 animated pulse">

                    </div>
                    <div class="page3_222 animated tada">

                    </div>
                    <div class="page3_223 animated flipInX">

                    </div>
                </div>

            </div>
            <div class="page3_3">
                <div class="page3_31 p_bg">
                    <span class="page3_31_t">女</span>
                    <div class="page3_211" style="margin-left: 250px"></div>
                    <div class="page3_212" style="margin-left: 180px"></div>
                    <div class="page3_213" style="margin-left: 115px"></div>
                    <div class="page3_214" style="margin-left: 50px"></div>
                </div>
                <div class="page3_32">
                    <div class="page3_321 animated pulse">

                    </div>
                    <div class="page3_322 animated tada">

                    </div>
                    <div class="page3_323 animated flipInX">

                    </div>
                </div>
            </div>
        </div>
        <div class="page4">
            <div class="page4_1">
                年龄越大越爱大胸
            </div>
            <div class="page4_2">
                <div class="page4_21"></div>
                <div class="page4_22"></div>
                <img src="images/p4-1.png" class="animated flash delay infinite">
            </div>
            <div class="page4_3">
                <div class="page4_31"></div>
                <div class="page4_32"></div>
                <img src="images/p4-2.png" class="animated flash delay infinite">
            </div>
        </div>
        <div class="page5">
            <div class="page5_1">
                <div class="page5_1_1">

                </div>

                <div class="page5_1_2">

                </div>
            </div>

            <div class="page5_2 animated zoomIn">
                <img src="images/xmd.gif"  style="width: 98px;position: absolute;top: 71px;left: 64px;">
                <img src="images/dcd.gif"  style="top: 57px;width: 85px;right: 64px;position: absolute;">
                <img src="images/gsd.gif"  style="width: 130px;top: 532px; position: absolute;left: 35px;">
                <img src="images/zcg.gif"  style="width: 176px;position: absolute;right: 52px;top: 554px;">
            </div>

            <div class="page5_3 animated zoomIn">

            </div>

            <div class="page5_4">

            </div>
            <div class="page5_5">

            </div>
        </div>
        <div class="page6">
            <div class="page6_1">
                年龄越小越是颜控
            </div>
            <div class="page6_2">
                <div class="page6_21"></div>
                <div class="page6_22"></div>
                <img class="p6-m1 animated flash delay infinite" src="images/p2-1.png">
            </div>
            <div class="page6_3">
                <div class="page6_31"></div>
                <div class="page6_32"></div>
                <img class="p6-m2 animated flash delay infinite" src="images/p2-2.png">
            </div>
        </div>
        <div class="page7">
            <div class="page7_1">
                身高各不同,择偶差异大
            </div>
            <div class="page7_2">
                <div class="page7_21 p_bg">
                    <div class="page7_21_t">男</div>
                    <div class="page7_211"></div>
                    <div class="page7_212"></div>
                    <div class="page7_213"></div>
                    <div class="page7_214"></div>
                </div>
                <div class="page7_22">
                    <div class="page7_221 animated pulse">

                    </div>
                    <div class="page7_222 animated tada">

                    </div>
                    <div class="page7_223 animated flipInX">

                    </div>
                </div>

            </div>
            <div class="page7_3">
                <div class="page7_31 p_bg">
                    <div class="page7_31_t">女</div>
                    <div class="an page7_211" style="margin-left: 250px"></div>
                    <div class="an page7_212" style="margin-left: 180px"></div>
                    <div class="an page7_213" style="margin-left: 115px"></div>
                    <div class="an page7_214" style="margin-left: 50px"></div>
                </div>
                <div class="page7_32">
                    <div class="an page7_321 animated pulse">

                    </div>
                    <div class="an page7_322 animated tada">

                    </div>
                    <div class="an page7_323 animated flipInX">

                    </div>
                </div>
            </div>
        </div>
        <div class="page8">
            <div class="page8_1">
                处女座:我并不喜欢人类
            </div>
            <img src="images/xx-t1.png" class="p8-m1">
            <img src="images/tp.png" class="p8-m2">
            <img src="images/sz.png" class="animated shake infinite p8-m3">
            <img src="images/cv.png" class="p8-m4">
            <img src="images/xz-t2.png" class="p8-m5">
            <img src="images/by.png" class="animated shake infinite p8-m6">
            <img src="images/mj.png" class="animated shake infinite p8-m7">


        </div>

        <div class="page9">
            <div class="page9_1">
                O型血:美蚊子快快来
            </div>
            <img src="images/xxm.png" class="p9-m1 animated bounce infinite">
            <img src="images/xxt.png" class="p9-m2">
        </div>

    </div>
    <div class="bottom_box">
        <p class="bl_line"></p>
        <p class="br_line"></p>
        <p class="b_yuan"></p>
        <p class="b_yuan_t f20 black2 fw">左右倾斜手机</p>
        <p class="bl_yuan"></p>
        <p class="br_yuan"></p>
    </div>
</div>

<div class="footer f20 black2 fw"></div>

<script type="text/javascript" src="js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="http://pingjs.qq.com/h5/stats.js" name="MTAH5" sid="500162855" ></script>
<script type="text/javascript">
    wx.config(
    <?php echo $wxParams;?>
    );
    wx.ready(function () {
        wx.onMenuShareTimeline({
            title: '大兴人择偶标准大揭秘,看脸还是看胸?', // 分享标题
            link: 'http://www.wexue.top/m7/index.php', // 分享链接
            imgUrl: 'http://www.wexue.top/m7/images/tp.png', // 分享图标
            success: function () {
                MtaH5.clickStat('shareCircle');
            },
            cancel: function () {
            }
        });
        wx.onMenuShareAppMessage({
            title: '大兴人择偶标准大揭秘,看脸还是看胸?', // 分享标题
            desc: '我是白羊座,我只爱大胸妹!', // 分享描述
            link: 'http://www.wexue.top/m7/index.php', // 分享链接
            imgUrl: 'http://www.wexue.top/m7/images/tp.png', // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                MtaH5.clickStat('shareFriend');
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    });
</script>
<audio src="media/love.mp3" volume="0.1" autoplay preload="auto"></audio>
</body>
</html>

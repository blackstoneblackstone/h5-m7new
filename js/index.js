window.AudioContext = window.AudioContext || window.webkitAudioContext || window.mozAudioContext;
var  audio = document.getElementById('a1');

window.onload = function() {
    $(".tankuang").click(function(){
        $(this).hide();
        audio.play();
        start=1;
    });
    var ctx = new AudioContext();
    var analyser = ctx.createAnalyser();
    var audioSrc = ctx.createMediaElementSource(audio);
    audioSrc.connect(analyser);
    analyser.connect(ctx.destination);
    var frequencyData = new Uint8Array(analyser.frequencyBinCount);

    var canvas = document.getElementById('audio-canvas'),
        cwidth = canvas.width,
        cheight = canvas.height - 2,
        meterWidth = 10, //width of the meters in the spectrum
        gap = 2, //gap between meters
        capHeight = 2,
        capStyle = '#fff',
        meterNum = 640/ (10 + 2), //count of the meters
        capYPositionArray = []; ////store the vertical position of hte caps for the preivous frame
    ctx = canvas.getContext('2d'),
        gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(1, '#e5ddd3');
    gradient.addColorStop(0.5, '#e5ddd3');
    gradient.addColorStop(0, '#e5ddd3');
    // loop
    function renderFrame() {
        var array = new Uint8Array(analyser.frequencyBinCount);
        analyser.getByteFrequencyData(array);
        var step = Math.round(array.length / meterNum); //sample limited data from the total array
        ctx.clearRect(0, 0, cwidth, cheight);
        for (var i = 0; i < meterNum; i++) {
            var value = array[i * step];
            if (capYPositionArray.length < Math.round(meterNum)) {
                capYPositionArray.push(value);
            };
            ctx.fillStyle = capStyle;
            //draw the cap, with transition effect
            if (value < capYPositionArray[i]) {
                ctx.fillRect(i * 12, cheight - (--capYPositionArray[i]), meterWidth, capHeight);
            } else {
                ctx.fillRect(i * 12, cheight - value, meterWidth, capHeight);
                capYPositionArray[i] = value;
            };
            ctx.fillStyle = gradient; //set the filllStyle to gradient for a better look
            ctx.fillRect(i * 12 /*meterWidth+gap*/ , cheight - value + capHeight, meterWidth, cheight); //the meter
        }
        requestAnimationFrame(renderFrame);
    }
    renderFrame();
};


function orientationChange() {
    switch (window.orientation) {
        case 0:
            break;
        case -90:
            alert("请竖屏查看页面，效果更佳");
            break;
        case 90:
            alert("请竖屏查看页面，效果更佳");
            break;
        case 180:
            break
    }
};
var bjwin = $(window).width();
var isopen = 1;
var screen1 = true;
var screen2 = true;
var screen3 = true;
var screen4 = true;
document.getElementById('bjk').innerHTML = bjwin;
addEventListener('load', function() {
    orientationChange();
    window.onorientationchange = orientationChange
});
if (window.DeviceMotionEvent) {
    window.addEventListener('deviceorientation', function(event) {
        var bjleft = $(".bj").css("left");
        var yidong = Math.abs(bjleft.replace("px", ""));
        var tuoluo = Math.round(event.gamma);
        var chufa = yidong / bjwin;
        var alpha=event.alpha;
        document.getElementById('beta').innerHTML = Math.round(event.beta);
        document.getElementById('alpha').innerHTML = Math.round(event.alpha);
        document.getElementById('gamma').innerHTML = tuoluo;
        document.getElementById('lefts').innerHTML = yidong;
        document.getElementById('pmb').innerHTML = chufa;
        document.getElementById('open').innerHTML = isopen;
        if (tuoluo > 15 && isopen == 1 && start == 1) {
            isopen = 0;
            var lxtime = Math.abs((8 - Math.round(chufa) + 0.5) * 1500);
            $(".bj").stop().animate({
                left: '-800%'
            }, lxtime, "linear");
            $(".bl_yuan").stop().removeClass("bl_yuan_action");
            $(".br_yuan").stop().addClass("br_yuan_action");
            document.getElementById('open').innerHTML = isopen;
        } else if (tuoluo < -15 && isopen == 1 && start == 1) {
            isopen = 0;
            var lxtime2 = (Math.round(chufa) + 0.5) * 1500;
            $(".bj").stop().animate({
                left: '0%'
            }, lxtime2, "linear");
            $(".br_yuan").stop().removeClass("br_yuan_action");
            $(".bl_yuan").stop().addClass("bl_yuan_action");
            document.getElementById('open').innerHTML = isopen;
        } else if (tuoluo <= 15 && tuoluo >= -15 && isopen == 0 && start == 1) {
            isopen = 1;
            $(".bj").stop();
            $(".br_yuan").stop().removeClass("br_yuan_action");
            $(".bl_yuan").stop().removeClass("bl_yuan_action");
            document.getElementById('open').innerHTML = isopen;
        }
        // if (chufa >= 0 && chufa <= 0.5) {
        //
        // } else if (chufa >= 0.75 && chufa <= 1.3) {
        //
        // } else if (chufa >= 2.6 && chufa <= 3.3) {
        //
        // } else if (chufa >= 4.1 && chufa <= 4.3) {
        //     $(".an").stop().fadeOut(1000);
        //     if(alpha>0){
        //         $(".p6-m1").stop().delay(500).fadeIn(500);
        //         $(".p6-m2").stop().delay(1000).fadeIn(500);
        //     }else{
        //     }
        //
        // } else if (chufa >= 5.1 && chufa <= 5.3) {
        //     $(".an").stop().fadeOut(1000);
        //     if(alpha>0){
        //         $(".page7 .an").stop().delay(500).fadeIn(500);
        //     }else{
        //         $(".p6-m1").stop().delay(500).fadeIn(500);
        //         $(".p6-m2").stop().delay(1000).fadeIn(500);
        //     }
        // } else if (chufa >= 6.1 && chufa <= 6.3) {
        //     $(".an").stop().fadeOut(1000);
        //     if(alpha>0){
        //         $(".page7 .an").stop().delay(500).fadeIn(500);
        //     }else{
        //         $(".p6-m1").stop().delay(500).fadeIn(500);
        //         $(".p6-m2").stop().delay(1000).fadeIn(500);
        //     }
        //
        // }
    })
}

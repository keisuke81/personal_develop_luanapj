//画像の設定

var windowwidth = window.innerWidth || document.documentElement.clientWidth || 0;
if (windowwidth > 768) {
    var responsiveImage = [ //PC用の画像
        { src: './images/slide/slide01.jpg' },
        { src: './images/slide/slide02.jpg' },
        { src: './images/slide/slide03.jpg' },
        { src: './images/slide/slide04.jpg' }
    ];
} else {
    var responsiveImage = [ //タブレットサイズ（768px）以下用の画像
        { src: './images/slide/slide01.jpg' },
        { src: './images/slide/slide02.jpg' },
        { src: './images/slide/slide03.jpg' },
        { src: './images/slide/slide04.jpg' }
    ];
}

//Vegas全体の設定

$('#main').vegas({
    overlay: true, //画像の上に網線やドットのオーバーレイパターン画像を指定。
    transition: 'fade', //切り替わりのアニメーション。http://vegas.jaysalvat.com/documentation/transitions/参照。fade、fade2、slideLeft、slideLeft2、slideRight、slideRight2、slideUp、slideUp2、slideDown、slideDown2、zoomIn、zoomIn2、zoomOut、zoomOut2、swirlLeft、swirlLeft2、swirlRight、swirlRight2、burnburn2、blurblur2、flash、flash2が設定可能。
    transitionDuration: 6000, //切り替わりのアニメーション時間をミリ秒単位で設定
    delay: 15000, //スライド間の遅延をミリ秒単位で。
    animationDuration: 60000, //スライドアニメーション時間をミリ秒単位で設定
    slides: responsiveImage, //画像設定を読む
    overlay: './js/overlays/01.png',
    animation: 'kenburns',
    timer: false
});
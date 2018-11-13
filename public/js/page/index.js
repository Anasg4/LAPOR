var ListLaporanClicked = false;

// animating List
$('.laporan').click(function () {

    if (!ListLaporanClicked) {
        var timeline = anime.timeline({ autoplay: false })
        timeline.add({
            targets: '.laporan-container',
            opacity: 0,
            duration: 500,
            autoplay: false,
            easing: [.98, -0.01, .58, .58],
            complete: function (anim) {
                $('.laporan-container').removeClass('ten wide column').addClass('five wide column')
            }
        }).add({
            targets: '.laporan-container',
            opacity: 1,
            duration: 1000,
            autoplay: false,
            easing: [.98, -0.01, .58, .58],
            complete: function (anim) {
                $('#detail-panel').css('display', 'block')
            }
        }).add({
            targets: '#detail-panel',
            opacity: 1,
            duration: 300,
            scale: ['0', '1'],
            easing: [0.815, 0.060, 0.000, 0.845],
            elasticity: 800,
            complete: function(anim){
                ListLaporanClicked = true
            }
        })
        timeline.play()
    }else{
        var animateDetailPanel = anime({
            targets: '#detail-panel',
            opacity: 1,
            duration: 300,
            scale: ['0','1'],
            easing: [0.815, 0.060, 0.000, 0.845],
            elasticity: 800,
            autoplay: false
        })
        animateDetailPanel.play();
    }

})

$('#detail-panel').click(function() {
    var timeline = anime.timeline({ autoplay: false })
        timeline.add({
            targets: '#detail-panel',
            opacity: 0,
            duration: 300,
            scale: ['1', '0'],
            easing: [0.815, 0.060, 0.000, 0.845],
            elasticity: 800,
            complete: function (anim) {
                $('#detail-panel').css('display', 'none')                
            }

        }).add({
            targets: '.laporan-container',
            opacity: 0,
            duration: 500,
            autoplay: false,
            easing: [.98, -0.01, .58, .58],
            complete: function (anim) {
                $('.laporan-container').removeClass('five wide column').addClass('ten wide column')
            }
        }).add({
            targets: '.laporan-container',
            opacity: 1,
            duration: 1000,
            autoplay: false,
            easing: [.98, -0.01, .58, .58],
            complete: function (anim) {                
                ListLaporanClicked = false
            }
        })
        timeline.play()
})

$('document').ready(function() {
    animateLanding.play()    
})

var animateLanding = anime({
    targets: '.left-panel, .laporan-panel',
    scale: [0, 1],
    opacity: [0, 1],
    duration: 500,
    autoplay: false,
    easing: [0.815, 0.060, 0.000, 0.845]
})
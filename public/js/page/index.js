var ListLaporanClicked = false;

$('.ui.dropdown').dropdown()

// animating List
$('.laporan').click(function () {

    // showDetail(this.data('id'))
    let id_laporan = $(this).data('laporan-id')
    getData(id_laporan)

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
            complete: function (anim) {
                ListLaporanClicked = true
            }
        })
        timeline.play()
    } else {
        var animateDetailPanel = anime({
            targets: '#detail-panel',
            opacity: 1,
            duration: 300,
            scale: ['0', '1'],
            easing: [0.815, 0.060, 0.000, 0.845],
            elasticity: 800,
            autoplay: false
        })
        animateDetailPanel.play();
    }

})

$('#back-panel').click(function () {
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

$('document').ready(function () {
    animateLanding.play()
})

var animateLanding = anime({
    targets: '.panel-container',
    scale: [0, 1],
    opacity: [0, 1],
    duration: 500,
    autoplay: false,
    easing: [0.815, 0.060, 0.000, 0.845]
})

function showDetail(data_laporan) {

    console.log(data_laporan);
    if(data_laporan.report_status == 0){
        $('#status-laporan').removeClass().addClass('ui mini red label')
    }else if(data_laporan.report_status == 1){
        $('#status-laporan').removeClass().addClass('ui mini yellow label')
    }else{
        $('#status-laporan').removeClass().addClass('ui mini green label')
    }

    $('#status-laporan').html(data_laporan.status)
    $('#violation-laporan').html(data_laporan.violation)
    $('#created-laporan').html(data_laporan.created)
    $('#description-laporan').html(data_laporan.description)
    $('#username-laporan').html(data_laporan.username)
    $('#location-laporan').html(data_laporan.location)
    $('#evidence-laporan').attr('src', data_laporan.path)    
    $('#form-update, #form-delete').attr('action', '/admin/report/'+data_laporan.id)        
    $('#status-verifikasi').html(data_laporan.status)
}

function getData(id_laporan) {
    $.ajax({
        url: "/report/detail/" + id_laporan,
        method: "GET",
        dataType: "JSON",
        success: function (result) {
            showDetail(result)
        }
    });
}

$('#update-laporan').click(function() {
    $('#form-update').submit()
})

$('#delete-laporan').click(function() {
    console.log('true');  
    $('#form-delete').submit() 
})

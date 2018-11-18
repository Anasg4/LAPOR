var ListLaporanClicked = false;

$('.ui.dropdown').dropdown()


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

function showDetail(data_reward) {

    console.log(data_reward);
    
    $('#nama-reward').html(data_reward.name)
    $('#point-reward').html(data_reward.point)    
    $('#image-reward').attr('src', '/storage/voucher/'+ data_reward.name +'.jpg')    
    $('#form-reward').attr('action', '/reward/'+data_reward.id)            
}

function getData(id_laporan) {
    $.ajax({
        url: "/reward" + id_laporan,
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

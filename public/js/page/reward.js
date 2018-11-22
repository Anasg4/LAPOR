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


$('.user.reward')
    .popup({
        content: 'Klik untuk dapatkan kode unik',
        variation: 'tiny inverted',
        position: 'bottom left',
        transition: 'fade up'
    })


$('.ui.button.copy').click(function() {    
    $('#reward-code').select()

    document.execCommand('copy')

    $('.message.copy')
    .transition('fade in', 500)

})


$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')    
  })

$('.user.reward').click(function() {
    const code = $(this).data('reward-id').toUpperCase()
    const name = $(this).find('p').first().html()
    
    $('#reward-code').val(code)
    $('#reward-title').html(name)
    $('.ui.modal').modal('show')    
})

$('#bars').click(function () {
    $('.mysidebar').toggle('slow')
})

var createRewardClicked = false;
var buttonCreateReward = $('#open-create-reward')

$('.ui.dropdown').dropdown()


$('document').ready(function () {
    animateLanding.play()
})

$('#button-reward').click(function () {
    $('#form-reward').submit()
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


$('.ui.button.copy').click(function () {
    $('#reward-code').select()

    document.execCommand('copy')

    $('.message.copy')
        .transition('fade in', 500)

})


$('.message .close')
    .on('click', function () {
        $(this)
            .closest('.message')
            .transition('fade')
    })

$('.user.reward').click(function () {
    const code = $(this).data('reward-id').toUpperCase()
    const name = $(this).find('p').first().html()

    $('#reward-code').val(code)
    $('#reward-title').html(name)
    $('.ui.modal').modal('show')
})


function thumbnail(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        const file = input.files[0];
        const filetype = file.type;
        const allowed = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
        if (allowed.indexOf(filetype) == -1) {
            $('.ui.modal.type').modal('show')
            input.value = '';
            $('.imgbuffer').attr('src', '');
        } else {
            if ((file.size / 1000) > 4000) {
                $('.ui.modal.size').modal('show')
                input.value = '';
                $('.imgbuffer').attr('src', '');
            } else {
                reader.onload = function (e) {
                    $('.imgbuffer').attr('src', e.target.result);
                    $('#filename').val(input.value.split(/(\\|\/)/g).pop()); s
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    } else {
        alert("select file before uploading");
    }
}

$("#gambar").change(function () {
    thumbnail(this);
});

$('input').focus(function () {
    const id = this.id;
    const target = '[target="' + id + '"]';
    const rippleIn = anime({
        targets: target,
        width: '100%',
        easing: [0.815, 0.060, 0.000, 0.845],
        duration: 400,
        autoplay: false
    })
    rippleIn.play();
});


$('input').blur(function () {
    const id = this.id;
    const target = '[target="' + id + '"]';
    const rippleOut = anime({
        targets: target,
        width: 0,
        easing: [0.815, 0.060, 0.000, 0.845],
        duration: 400,
        autoplay: false
    })
    rippleOut.play();
})

$(buttonCreateReward).click(function () {    

    if (!createRewardClicked) {
        var resize = '#created-reward'
        var show = '#create-reward'

        var timeline = anime.timeline({ autoplay: false })
        timeline.add({
            targets: resize,
            opacity: 0,
            duration: 500,
            autoplay: false,
            easing: [.98, -0.01, .58, .58],
            complete: function (anim) {
                $(resize).removeClass('ten wide column').addClass('five wide column')
                $(show).css('display', 'block')
            }
        }).add({
            targets: show,
            opacity: 1,
            duration: 300,
            scale: ['0', '1'],
            easing: [0.815, 0.060, 0.000, 0.845],
            elasticity: 800,
            complete: function (anim) {
              
            }
        }).add({
            targets: resize,
            opacity: 1,
            duration: 1000,
            autoplay: false,
            easing: [.98, -0.01, .58, .58],
            complete: function (anim) {
                createRewardClicked = true
                $(buttonCreateReward).css('display','none')
            }
        })
        timeline.play()
    }

})


$('#bars').click(function () {
    $('.mysidebar').toggle('slow')
})

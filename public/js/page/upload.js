var buttondetail = $('#buttondetail')
var buttonbukti = $('#buttonbukti')

$('.ui.selection.dropdown').dropdown()

// $(buttonbukti).click(function(){
//     $('#form-laporan').submit()
// })

var animateCard = anime({
    targets: '.ui.card',
    delay: 200,
    opacity: [0, 1],
    easing: [0.815, 0.060, 0.000, 0.845],
    elasticity: 800,
    duration: 500
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

$('.ui.form')
    .form({
        on: 'blur',
        inline: true,
        fields: {
            description: {
                identifier: 'description',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Keterangan tidak boleh kosong'
                    }
                ]
            },
            number: {
                identifier: 'number',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Plat nomor tidak boleh kosong'
                    }
                ]
            },
            location: {
                identifier: 'location',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Lokasi tidak boleh kosong'
                    }
                ]
            },
            evidence: {
                identifier: 'evidence',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Anda harus mengupload mengunggah kejadian'
                    }
                ]
            },
            violation: {
                identifier: 'violation',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Pelanggaran tidak boleh kosong'
                    }
                ]
            }
        }
    })
    ;



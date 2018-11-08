var buttondetail = $('#buttondetail');
var buttonbukti = $('#buttonbukti');

$('.ui.selection.dropdown').dropdown();


var animateCard = anime({
    targets: '.ui.card',
    delay: 200,      
    scale: ['0','1'],
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
            alert("invalid file type. please select image with this extension (.jpg/.png/.jpeg/.gif)");
            input.value = '';
            $('.imgbuffer').attr('src', '');
        } else {
            if ((file.size / 1000) > 4000) {
                alert("Maximum file size is 4MB");
                input.value = '';
                $('.imgbuffer').attr('src', '');
            } else {
                reader.onload = function (e) {
                    $('.imgbuffer').attr('src', e.target.result);
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


$('.next').click(function () {

    var targetShow = '';
    var targetHide = '';
    
    if(this.id == 'buttondetail'){
        console.log(this.id);
        targetShow = '#formbukti';
        targetHide = '#formdetail';
    }else{
        targetShow = '#formdetail';
        targetHide = '#formbukti';
    }

    const hideform = anime({
        targets: targetHide,        
        opacity: [
            {value:[1,0], duration: 500}
        ],
        easing: [0.815, 0.060, 0.000, 0.845],
        duration: 1000,
        autoplay: false,
        complete: function() {
            $(targetHide).css('display', 'none');
        }
    });
    hideform.play();    

    $(targetShow).css('display', 'inherit');
    const showform = anime({
        targets: targetShow,        
        translateY: [
            // { value: 200, duration: 500, elasticity: 100 },
            { value: [200,0], duration: 500, delay: 0, elasticity: 100 }
        ],
        opacity: [
            {value:[0,1], duration: 1200, delay: 200}
        ],
        easing: [0.815, 0.060, 0.000, 0.845],
        duration: 1000,
        autoplay: false
    });
    showform.play();    
})

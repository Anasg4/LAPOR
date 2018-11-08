
$('#NIK').blur(NikError);
$('#password').blur(PassError);
$('#btnMasuk').click(auth);
$('#left-container').css('transform: scaleX(2) !important');

$('input').focus(function() {
  const id = this.id;
  const target = '[target="'+id+'"]';  
  const rippleIn = anime({
    targets: target,
    width: '100%',
    easing: [0.815, 0.060, 0.000, 0.845],    
    duration: 400,
    autoplay: false
  })
  rippleIn.play();
});


$('input').blur(function() {
  const id = this.id;
  const target = '[target="'+id+'"]';  
  const rippleOut = anime({
    targets: target,
    width: 0,
    easing: [0.815, 0.060, 0.000, 0.845],    
    duration: 400,
    autoplay: false
  })
  rippleOut.play();
})

function PassError(){
  const pass = $('.ui.form').form('is valid', 'password');
  if(!pass){
    $('.ui.fluid.link.card').transition('shake');    
  }
};

function NikError(){
  const nik = $('.ui.form').form('is valid', 'NIK');
  if(!nik){
    $('.ui.fluid.link.card').transition('shake');    
  }
};

var animateCard = anime({
  targets: '.ui.card',
  delay: 200,      
  scale: ['0','1'],
  easing: [0.815, 0.060, 0.000, 0.845],   
  elasticity: 800, 
  duration: 500    
});

var animateText = anime({
  targets: '#section-left',
  translateX: [600,0],
  easing: [0.830, 0.060, 0.170, 1.355],     
  opacity: [0, 1],
  duration: 500
})


function auth(){
  console.log("asdsa");    
  window.location.href = './index.html';
}


$('.ui.checkbox')
  .checkbox()
;

$('.camera.icon')
  .transition('set looping')
  .transition('bounce', '4000ms')
;

$('.ui.form')
  .form({
    on: 'blur',
    inline : true,
    fields: {
      NIK: {
        identifier  : 'NIK',
        rules: [
          {
            type   : 'empty',
            prompt : 'NIK tidak boleh kosong'
          },
          {
            type   : 'integer',
            prompt : 'NIK tidak boleh berisikan huruf'
          }
        ]
      },
      password: {
        identifier  : 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Password tidak boleh kosong'
          }
        ]
      }
    }
  })
;

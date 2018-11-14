

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


var animateCard = anime({
  targets: '#section-container',
  opacity: [0,1],
  scale: [0,1],
  easing: [0.815, 0.060, 0.000, 0.845],
  elasticity: 800,
  duration: 500
});

$('.newspaper.icon')
.transition('set looping')
.transition('bounce', '4000ms')
;

$('.ui.form')
.form({
  on: 'blur',
  inline : true,
  fields: {
    nama: {
        identifier  : 'name',
        rules: [
          {
            type   : 'empty',
            prompt : 'nama tidak boleh kosong'
          }
        ]
      },
    NIK: {
      identifier  : 'nik',
      rules: [
        {
          type   : 'empty',
          prompt : 'NIK tidak boleh kosong'
        },
        {
          type   : 'integer',
          prompt : 'NIK tidak boleh berisikan huruf'
        },
        {
          type   : 'exactLength[16]',
          prompt : 'NIK harus {ruleValue} characters'
        }
      ]
    },
    email: {
        identifier  : 'email',
        rules: [
          {
            type   : 'email',
            prompt : 'Email tidak valid'
          }
        ]
      },
    password: {
      identifier  : 'password',
      rules: [
        {
          type   : 'empty',
          prompt : 'Password tidak boleh kosong'
        },
        {
            type: 'minLength[6]',
            prompt: 'Password minimal 6 karakter'
        }
      ]
    }
  }
})
;


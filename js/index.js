
/*** SLIDE INTO ORDER ***/

const orderBtn = document.querySelector('.js-order-btn');
const orderForm = document.getElementById('order');

orderBtn.addEventListener('click', () => {
  orderForm.scrollIntoView();
});

/*** TOGGLE NAV ***/

const navBtn = document.querySelector(".js-nav-mobile-menu-btn");
const nav = document.querySelector(".js-nav-list");
const icons = document.querySelectorAll('.js-nav__mobile-menu-img');

navBtn.addEventListener('click', () => {
  nav.classList.toggle('nav__list--active');
  icons.forEach((icon) => {
    icon.classList.toggle('nav__mobile-menu-img--active');
  })
});

/*** EMAIL DATA ***/

$(document).ready(function () {
  $('#formButton').on('click', function (e) {
    e.preventDefault;
    var formdata = $('#beer-order').serialize();
    $.ajax({
      url: 'mailer.php',
      type: 'post',
      dataType: 'json',
      data: {
        formdata: formdata,
      },
    })
      .done(function (data) {
        if (data.success === false) {
          $.toast({
            loader: false,
            icon: 'error',
            text: data.message,
            position: 'bottom-center',
            transition: 'slide',
            bgColor: '#bb2123da',
            textColor: '#fff',
            stack: false,
            hideAfter: 5000,
          });
        }

        if (data.success === true) {
          $.toast({
            loader: false,
            icon: 'success',
            text: data.message,
            position: 'bottom-center',
            transition: 'slide',
            bgColor: '#22bb34de',
            textColor: '#fff',
            stack: false,
            hideAfter: 5000,
          });
          setTimeout(() => {
            location.reload();
          }, 5000);
        }
      })
      .fail(function (err) {
        console.log(err);
      });
  });
});

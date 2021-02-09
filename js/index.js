/*---- Waypoints ---- */
const waypoint = new Waypoint({
  element: document.querySelector(".section-about"),
  handler: function (direction) {
    const nav = document.querySelector("nav");
    const text = document.querySelector(".about-first");
    if (direction === "down") {
      nav.classList.add("sticky");
      text.style.animation = "slide 2s ease";
    } else {
      nav.classList.remove("sticky");
    }
  },
  offset: "60px",
});

const waypoint2 = new Waypoint({
  element: document.querySelector("main"),
  handler: function (direction) {
    const text1 = document.querySelector(".about-first");
    const text2 = document.querySelector(".about-second");
    const text3 = document.querySelector(".about-third");
    if (direction === "down") {
      text1.style.animation = "slide 2s ease-in";
      text2.style.animation = "slide 3s ease-in";
      text3.style.animation = "slide 4s ease-in";
    }
  },
  offset: "60px",
});

/* ----- MOBILE MENU ----- */

$(document).ready(function () {
  $(".mobile-nav-icon").click(function () {
    const nav = $(".main-nav");
    let icon = $(".mobile-nav-icon i");
    nav.slideToggle(200);

    if (icon.hasClass("ion-navicon-round")) {
      icon.addClass("ion-close-round");
      icon.removeClass("ion-navicon-round");
    } else {
      icon.addClass("ion-navicon-round");
      icon.removeClass("ion-close-round");
    }
  });
});

/*** EMAIL DATA ***/

$(document).ready(function () {
  $("#formButton").on("click", function (e) {
    e.preventDefault;
    var formdata = $("#beer-order").serialize();
    $.ajax({
      url: "mailer.php",
      type: "post",
      dataType: "json",
      data: {
        formdata: formdata,
      },
    })
      .done(function (data) {
        if (data.success === false) {
          $.toast({
            loader: false,
            icon: "error",
            text: data.message,
            position: "bottom-center",
            transition: "slide",
            bgColor: "#bb2123da",
            textColor: "#fff",
            stack: false,
            hideAfter: 5000,
          });
        }

        if (data.success === true) {
          $.toast({
            loader: false,
            icon: "success",
            text: data.message,
            position: "bottom-center",
            transition: "slide",
            bgColor: "#22bb34de",
            textColor: "#fff",
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

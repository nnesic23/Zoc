/*---- Waypoints ---- */
const waypoint = new Waypoint({
  element: document.querySelector(".section-about"),
  handler: function (direction) {
    const nav = document.querySelector("nav");
    if (direction === "down") {
      nav.classList.add("sticky");
    } else {
      nav.classList.remove("sticky");
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

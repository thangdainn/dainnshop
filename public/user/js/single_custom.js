/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Thumbnail
5. Init Quantity
6. Init Star Rating
7. Init Favorite
8. Init Tabs



******************************/

jQuery(document).ready(function ($) {
  "use strict";

  /* 

	1. Vars and Inits

	*/

  var header = $(".header");
  var topNav = $(".top_nav");
  var hamburger = $(".hamburger_container");
  var menu = $(".hamburger_menu");
  var menuActive = false;
  var hamburgerClose = $(".hamburger_close");
  var fsOverlay = $(".fs_menu_overlay");

  setHeader();

  $(window).on("resize", function () {
    setHeader();
  });

  $(document).on("scroll", function () {
    setHeader();
  });

  initMenu();
  initThumbnail();
  initQuantity();
  initStarRating();
  initFavorite();
  initTabs();
  initSize();
  initBuyNow();
  initAddToCart();
  /* 

	2. Set Header

	*/

  function setHeader() {
    if (window.innerWidth < 992) {
      if ($(window).scrollTop() > 100) {
        header.css({ top: "0" });
      } else {
        header.css({ top: "0" });
      }
    } else {
      if ($(window).scrollTop() > 100) {
        header.css({ top: "-50px" });
      } else {
        header.css({ top: "0" });
      }
    }
    if (window.innerWidth > 991 && menuActive) {
      closeMenu();
    }
  }

  /* 

	3. Init Menu

	*/

  function initMenu() {
    if (hamburger.length) {
      hamburger.on("click", function () {
        if (!menuActive) {
          openMenu();
        }
      });
    }

    if (fsOverlay.length) {
      fsOverlay.on("click", function () {
        if (menuActive) {
          closeMenu();
        }
      });
    }

    if (hamburgerClose.length) {
      hamburgerClose.on("click", function () {
        if (menuActive) {
          closeMenu();
        }
      });
    }

    if ($(".menu_item").length) {
      var items = document.getElementsByClassName("menu_item");
      var i;

      for (i = 0; i < items.length; i++) {
        if (items[i].classList.contains("has-children")) {
          items[i].onclick = function () {
            this.classList.toggle("active");
            var panel = this.children[1];
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          };
        }
      }
    }
  }

  function openMenu() {
    menu.addClass("active");
    // menu.css('right', "0");
    fsOverlay.css("pointer-events", "auto");
    menuActive = true;
  }

  function closeMenu() {
    menu.removeClass("active");
    fsOverlay.css("pointer-events", "none");
    menuActive = false;
  }

  /* 

	4. Init Thumbnail

	*/

  function initThumbnail() {
    if ($(".single_product_thumbnails ul li").length) {
      var thumbs = $(".single_product_thumbnails ul li");
      var singleImage = $(".single_product_image_background");

      thumbs.each(function () {
        var item = $(this);
        item.on("click", function () {
          thumbs.removeClass("active");
          item.addClass("active");
          var img = item.find("img").data("image");
          singleImage.css("background-image", "url(" + img + ")");
        });
      });
    }
  }

  /* 

	5. Init Quantity

	*/

  function initQuantity() {
    if ($(".plus").length && $(".minus").length) {
      var plus = $(".plus");
      var minus = $(".minus");
      var value = $("#quantity_value");

      plus.on("click", function () {
        var x = parseInt(value.val());
        let maxItem = parseInt($(".total_item").text().split(" ")[0]);

        if (x < maxItem) {
          value.val(x + 1);
        }
      });

      minus.on("click", function () {
        var x = parseInt(value.val());
        if (x > 1) {
          value.val(x - 1);
        }
      });

      let inputElement = $("#quantity_value");
      inputElement.on("input", function () {
        // Lọc ra các ký tự số và không cho nhập bất kỳ ký tự nào khác
        $(this).val($(this).val().replace(/\D/g, ""));
        // Kiểm tra giá trị nhỏ nhất
        if (parseInt($(this).val()) < parseInt($(this).attr("min"))) {
          $(this).val($(this).attr("min"));
        }
        // Kiểm tra giá trị lớn nhất
        if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
          $(this).val($(this).attr("max"));
        }
      });

      inputElement.on("blur", function () {
        if ($(this).val() === "") {
          $(this).val($(this).attr("min"));
        }
      });
    }
  }

  /* 

	6. Init Star Rating

	*/

  function initStarRating() {
    if ($(".user_star_rating li").length) {
      var stars = $(".user_star_rating li");

      stars.each(function () {
        var star = $(this);

        star.on("click", function () {
          var i = star.index();

          stars.find("i").each(function () {
            $(this).removeClass("fa-star");
            $(this).addClass("fa-star-o");
          });
          for (var x = 0; x <= i; x++) {
            $(stars[x]).find("i").removeClass("fa-star-o");
            $(stars[x]).find("i").addClass("fa-star");
          }
        });
      });
    }
  }

  /* 

	7. Init Favorite

	*/

  function initFavorite() {
    if ($(".product_favorite").length) {
      var fav = $(".product_favorite");

      fav.on("click", function () {
        fav.toggleClass("active");
      });
    }
  }

  /* 

	8. Init Tabs

	*/

  function initTabs() {
    if ($(".tabs").length) {
      var tabs = $(".tabs li");
      var tabContainers = $(".tab_container");

      tabs.each(function () {
        var tab = $(this);
        var tab_id = tab.data("active-tab");

        tab.on("click", function () {
          if (!tab.hasClass("active")) {
            tabs.removeClass("active");
            tabContainers.removeClass("active");
            tab.addClass("active");
            $("#" + tab_id).addClass("active");
          }
        });
      });
    }
  }

  function initSize() {
    let sizeElm = $(".product_size ul li").not(".empty");
    sizeElm.on("click", function () {
      $("#error").hide();
      $("#exclamation").hide();
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(".total_item").text(
          $(".total_item").data("value") + " pieces available"
        );
      } else {
        sizeElm.removeClass("active");
        $(this).addClass("active");
        $(".total_item").text($(this).data("value") + " pieces available");
      }
      $("#quantity_value").val(1);
    });
  }

  function checkLogin() {
    let userId = $("#user_id").val();
    if (userId == "0") {
      return 0;
    }
    return userId;
  }

  function addToCartAjax(data) {
    let url = base_url + "/cart/add";
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      success: function (response) {
        if (response.status === "success") {
          showNotification();
        } else {
          alert("Add to cart failed");
        }
      },
    });
  }
  function buyNowAjax(data) {
    let url = base_url + "/cart/add";
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      success: function (response) {
        if (response.status === "success") {
          alert("Add to cart successfully");
        } else {
          alert("Add to cart failed");
        }
      },
    });
  }
  function buyNowAjax(data) {
    let url = base_url + "/cart/add";
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      success: function (response) {
        if (response.status === "success") {
          alert("Add to cart successfully");
        } else {
          alert("Add to cart failed");
        }
      },
    });
  }

  function initBuyNow() {
    $(".buy_now_button").on("click", function (e) {
      e.preventDefault();
      let userId = checkLogin();
      if (checkLogin() == 0) {
        window.location.href = base_url + "/login";
        return;
      }

      let productId = $("#product_id").val();
      let sizeElm = $(".product_size ul li.active");
      if (sizeElm.length === 0) {
        $("#error").show();
        $("#exclamation").css("display", "inline-block");
        return;
      }
      let sizeId = sizeElm.val();
      let quantity = $("#quantity_value").val();
      let data = {
        userId: userId,
        productId: productId,
        sizeId: sizeId,
        quantity: quantity,
        action: "buy_now",
      };
      buyNowAjax(data);
    });
  }

  function initAddToCart() {
    $(".add_to_cart_button").on("click", function (e) {
      e.preventDefault();
      let userId = checkLogin();
      if (checkLogin() == 0) {
        window.location.href = base_url + "/login";
        return;
      }
      let productId = $("#product_id").val();
      let sizeElm = $(".product_size ul li.active");
      if (sizeElm.length === 0) {
        $("#error").show();
        $("#exclamation").css("display", "inline-block");
        return;
      }
      let sizeId = sizeElm.val();
      let quantity = $("#quantity_value").val();
      let data = {
        userId: userId,
        productId: productId,
        sizeId: sizeId,
        quantity: quantity,
      };
      addToCartAjax(data);
    });
  }

  function showNotification() {
    let toast = $("#toast");
    toast.html(`<div class="alert alert-success d-flex flex-column" role="alert">
                  <div class="success_icon">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </div>
                  <p class="notification">Item has been added to your shopping cart !</p>
                </div>`);

    const autoRemoveToast = setTimeout(() => {
      $(".alert").remove();
    }, 2000 + 1300);

    $(document).on("click", function (event) {
      if (
        !$(event.target).closest(".alert").length &&
        !$(event.target).closest(".add_to_cart_button").length
      ) {
        $(".alert").remove();
        clearTimeout(autoRemoveToast);
      }
    });
  }
});

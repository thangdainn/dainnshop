/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Favorite
5. Init Fix Product Border
6. Init Isotope Filtering
7. Init Price Slider
8. Init Checkboxes



******************************/

jQuery(document).ready(function ($) {
  "use strict";

  /* 

	1. Vars and Inits

	*/

  var header = $(".header");
  var topNav = $(".top_nav");
  var mainSlider = $(".main_slider");
  var hamburger = $(".hamburger_container");
  var menu = $(".hamburger_menu");
  var menuActive = false;
  var hamburgerClose = $(".hamburger_close");
  var fsOverlay = $(".fs_menu_overlay");

  setHeader();

  $(window).on("resize", function () {
    initFixProductBorder();
    setHeader();
  });

  $(document).on("scroll", function () {
    setHeader();
  });

  initMenu();
  initFavorite();
  initFixProductBorder();
  initIsotopeFiltering();
  initPriceSlider();
  initCheckboxes();
  initFilter();
  initCategory();
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

	4. Init Favorite

	*/

  function initFavorite() {
    if ($(".favorite").length) {
      var favs = $(".favorite");

      favs.each(function () {
        var fav = $(this);
        var active = false;
        if (fav.hasClass("active")) {
          active = true;
        }

        fav.on("click", function () {
          if (active) {
            fav.removeClass("active");
            active = false;
          } else {
            fav.addClass("active");
            active = true;
          }
        });
      });
    }
  }

  /* 

	5. Init Fix Product Border

	*/

  function initFixProductBorder() {
    if ($(".product_filter").length) {
      var products = $(".product_filter:visible");
      var wdth = window.innerWidth;

      // reset border
      products.each(function () {
        $(this).css("border-right", "solid 1px #e9e9e9");
      });

      // if window width is 991px or less

      if (wdth < 480) {
        for (var i = 0; i < products.length; i++) {
          var product = $(products[i]);
          product.css("border-right", "none");
        }
      } else if (wdth < 576) {
        if (products.length < 5) {
          var product = $(products[products.length - 1]);
          product.css("border-right", "none");
        }
        for (var i = 1; i < products.length; i += 2) {
          var product = $(products[i]);
          product.css("border-right", "none");
        }
      } else if (wdth < 768) {
        if (products.length < 5) {
          var product = $(products[products.length - 1]);
          product.css("border-right", "none");
        }
        for (var i = 2; i < products.length; i += 3) {
          var product = $(products[i]);
          product.css("border-right", "none");
        }
      } else if (wdth < 992) {
        if (products.length < 5) {
          var product = $(products[products.length - 1]);
          product.css("border-right", "none");
        }
        for (var i = 2; i < products.length; i += 3) {
          var product = $(products[i]);
          product.css("border-right", "none");
        }
      }

      //if window width is larger than 991px
      else {
        if (products.length < 5) {
          var product = $(products[products.length - 1]);
          product.css("border-right", "none");
        }
        for (var i = 3; i < products.length; i += 4) {
          var product = $(products[i]);
          product.css("border-right", "none");
        }
      }
    }
  }

  /* 

	6. Init Isotope Filtering

	*/

  function initIsotopeFiltering() {
    let sortTypes = $(".type_sorting_btn");
    let sortNumbs = $(".num_sorting_btn");

    if ($(".product-container").length) {
      // sortTypes.on("click", function () {
      //   $(".type_sorting_text").text($(this).text());
      //   callAjax();
      // });

      sortTypes.each(function () {
        $(this).on("click", function () {
          $(".type_sorting_text").text($(this).text());
          callAjax();
        });
      });
      sortNumbs.each(function () {
        $(this).on("click", function () {
          $(".num_sorting_text").text($(this).text());
          callAjax();
        });
      });
    }
  }

  /* 

	7. Init Price Slider

	*/

  function initPriceSlider() {
    $("#slider-range").slider({
      range: true,
      min: 0,
      max: 6500,
      values: [0, 5100],
      slide: function (event, ui) {
        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
      },
    });

    $("#amount").val(
      "$" +
        $("#slider-range").slider("values", 0) +
        " - $" +
        $("#slider-range").slider("values", 1)
    );
  }

  /* 

	8. Init Checkboxes

	*/

  function initCheckboxes() {
    if ($(".checkboxes li").length) {
      var boxes = $(".checkboxes li");
      boxes.each(function () {
        var box = $(this);

        box.on("click", function () {
          if (box.hasClass("active")) {
            box.find("i").removeClass("fa-square");
            box.find("i").addClass("fa-square-o");
            box.toggleClass("active");
          } else {
            box.find("i").removeClass("fa-square-o");
            box.find("i").addClass("fa-square");
            box.toggleClass("active");
          }
          callAjax();
          // box.toggleClass('active');
        });
      });

      if ($(".show_more").length) {
        var checkboxes = $(".checkboxes");

        $(".show_more").on("click", function () {
          checkboxes.toggleClass("active");
        });
      }
    }
  }

  function initFilter() {
    $(".sidebar_title a").on("click", function () {
      var ulElement = $(this).parent().next();
      ulElement.toggleClass("showItem");
    });
    $(".filter_button").on("click", function () {
      callAjax();
    });
  }

  function initCategory() {
    $(".sidebar_categories li").on("click", function () {
      $(".sidebar_categories li").removeClass("active");
      $(".sidebar_categories li a").find("span").remove();
      $(".sidebar_categories li a").find("i").remove();
      $(this).addClass("active");
      $(this)
        .find("a")
        .prepend(
          '<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>'
        );
      callAjax();
    });
  }

  function initShowItem() {}

  function callAjax() {
    let limit = parseInt($("#limit").text());
    let data = getDataFilters(0, limit);
    pagingFilter(data, url_page);
  }
});

// const jwt = require("jsonwebtoken");

(function ($) {
  "use strict";

  /*==================================================================
    [ Focus input ]*/
  $(".input100").each(function () {
    $(this).on("blur", function () {
      if ($(this).val().trim() != "") {
        $(this).addClass("has-val");
      } else {
        $(this).removeClass("has-val");
      }
    });
  });

  /*==================================================================
    [ Validate ]*/
  var inputLogin = $(".validate-input-login .input100");

  $(".validate-form-login").on("submit", function (e) {
    e.preventDefault();
    let check = true;

    for (var i = 0; i < inputLogin.length; i++) {
      if (validate(inputLogin[i]) == false) {
        showValidate(inputLogin[i]);
        check = false;
      }
    }
    if (!check) {
      return check;
    }
    let data = {};
    let formData = $("#formLogin").serializeArray();
    $.each(formData, function (i, v) {
      data[v.name] = v.value;
    });

    console.table(data);
    let url = base_url + "/login/authentication";
    login(data, url);
  });
  var inputRegister = $(".validate-input-register .input100");

  $(".validate-form-register").on("submit", function (e) {
    e.preventDefault();
    let check = true;

    for (var i = 0; i < inputRegister.length; i++) {
      if (validate(inputRegister[i]) == false) {
        showValidate(inputRegister[i]);
        check = false;
      }
    }
    if (!check) {
      return check;
    }
    let data = {};
    let formData = $("#formRegister").serializeArray();
    $.each(formData, function (i, v) {
      data[v.name] = v.value;
    });

    let url = base_url + "/login/register";
    register(data, url);
  });

  $(".input100").each(function () {
    $(this).focus(function () {
      hideValidate(this);
    });
  });

  function validate(input) {
    if ($(input).attr("type") == "email" || $(input).attr("name") == "email") {
      if (
        $(input)
          .val()
          .trim()
          .match(
            /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/
          ) == null
      ) {
        return false;
      }
    } else {
      if ($(input).val().trim() == "") {
        return false;
      }
    }
  }

  function showValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).addClass("alert-validate");
  }

  function hideValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).removeClass("alert-validate");
  }

  /*==================================================================
    [ Show pass ]*/
  var showPass = 0;
  $(".btn-show-pass").on("click", function () {
    if (showPass == 0) {
      $(this).next("input").attr("type", "text");
      $(this).find("i").removeClass("zmdi-eye");
      $(this).find("i").addClass("zmdi-eye-off");
      showPass = 1;
    } else {
      $(this).next("input").attr("type", "password");
      $(this).find("i").addClass("zmdi-eye");
      $(this).find("i").removeClass("zmdi-eye-off");
      showPass = 0;
    }
  });

  let formLogin = $(".container-login100");
  let formRegister = $(".container-register100");
  let loginBtn = $("#login-btn");
  let registerBtn = $("#register-btn");
  registerBtn.on("click", function (e) {
    e.preventDefault();
    formLogin.css("opacity", "0");
    formLogin.css("z-index", "-1");

    formRegister.css("opacity", "1");
    formRegister.css("z-index", "1");
  });
  loginBtn.on("click", function (e) {
    e.preventDefault();
    formRegister.css("opacity", "0");
    formRegister.css("z-index", "-1");
    formLogin.css("opacity", "1");
    formLogin.css("z-index", "1");
  });

  $(".limiter").css("opacity", "1");
  $(".container-login100").css("opacity", "1");

  function login(data, url) {
    $.ajax({
      url: url,
      type: "POST",
      //   dataType: "html",
      data: data,
      success: function (data) {
        let message = JSON.parse(data);
        if (message.isLogin) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: message.msg,
            showConfirmButton: false,
            timer: 2000,
          });

          setTimeout(() => {
            window.location.href = base_url;
          }, 1500);
        } else {
          $(".error.login").text(message.msg);
          $(".error.login").show();
        }
      },
    });
  }
  function register(data, url) {
    $.ajax({
      url: url,
      type: "POST",
      //   dataType: "html",
      data: data,
      success: function (data) {
        let message = JSON.parse(data);
        if (message.isRegister) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: message.msg,
            showConfirmButton: false,
            timer: 2000,
          });

          setTimeout(() => {
            window.location.href = base_url + "/login";
          }, 1500);
        } else {
          $(".error.register").text(message.msg);
          $(".error.register").show();
        }
      },
    });
  }
})(jQuery);

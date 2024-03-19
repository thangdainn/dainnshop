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

  $(".input100").each(function () {
    $(this).focus(function () {
      hideValidate(this);
    });
  });

  /*==================================================================
    [ Validate ]*/

  function validateInput(input) {
    let check = true;

    for (let i = 0; i < input.length; i++) {
      if (validate(input[i]) == false) {
        showValidate(input[i]);
        check = false;
      }
    }
    return check;
  }

  // login
  var inputLogin = $(".validate-input-login .input100");

  $(".validate-form-login").on("submit", function (e) {
    e.preventDefault();
    let check = validateInput(inputLogin);
    if (!check) {
      return check;
    }
    let data = {};
    let formData = $("#formLogin").serializeArray();
    $.each(formData, function (i, v) {
      data[v.name] = v.value;
    });

    let url = base_url + "/login/authentication";
    login(data, url);
  });

  function login(data, url) {
    $.ajax({
      url: url,
      type: "POST",
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
          // $(".error.login").show();
        }
      },
    });
  }

  // register

  var inputRegister = $(".validate-input-register .input100");

  $(".validate-form-register").on("submit", function (e) {
    e.preventDefault();
    let check = validateInput(inputRegister);
    if (!check) {
      return check;
    }

    if ($("#password").val() != $("#confirm_password").val()) {
      $(".error.register").text("Password not match");
      $(".error.register").show();
      return false;
    }
    let data = {};
    let formData = $("#formRegister").serializeArray();
    $.each(formData, function (i, v) {
      data[v.name] = v.value;
    });

    let url = base_url + "/login/register";
    register(data, url);
  });

  function register(data, url) {
    $.ajax({
      url: url,
      type: "POST",
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
  // check email

  var inputEmailForgot = $("#email-forgot");

  $(".next-forgot").on("click", function (e) {
    e.preventDefault();
    let check = validateInput(inputEmailForgot);
    if (!check) {
      return check;
    }
    let data = {};
    let email = $("#email-forgot").val();
    data.email = email;

    let url = base_url + "/login/mailForgot";
    checkMailForgot(data, url);
  });

  function checkMailForgot(data, url) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: function (data) {
        let message = JSON.parse(data);
        if (message.isCheckMailForgot) {
          $(".error.forgot").hide();
          $(".validate-input-forgot #email-forgot").parent().hide();
          $(".validate-input-forgot.d-none").removeClass("d-none");
          $(".next-forgot").parent().hide();
          $(".submit-forgot").parent().removeClass("d-none");
        } else {
          $(".error.forgot").text(message.msg);
          $(".error.forgot").show();
        }
      },
    });
  }
  // forgot password

  var inputPassForgot = $(".validate-input-forgot input[type='password']");

  $(".submit-forgot").on("click", function (e) {
    e.preventDefault();
    let check = validateInput(inputPassForgot);
    if (!check) {
      return check;
    }

    let newPass = $("#new-pass").val();

    if (newPass != $("#confirm_pass-forgot").val()) {
      $(".error.forgot").text("Password not match");
      $(".error.forgot").show();
      return false;
    }
    let data = {};
    let email = $("#email-forgot").val();
    data.email = email;
    data.password = newPass;

    console.table(data);
    let url = base_url + "/login/forgotPassword";
    forgotPassword(data, url);
  });

  function forgotPassword(data, url) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: function (data) {
        let message = JSON.parse(data);
        if (message.isForgotPassword) {
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
          $(".error.forgot").text(message.msg);
          $(".error.forgot").show();
        }
      },
    });
  }

  // validate
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
    } else if (
      $(input).attr("type") == "password" ||
      $(input).attr("name") == "password"
    ) {
      if ($(input).val().trim().length < 6) {
        return false;
      }
    } else if (
      $(input).attr("type") == "tel" ||
      $(input).attr("name") == "phone"
    ) {
      if (
        $(input)
          .val()
          .trim()
          .match(/^0\d{9}$/) == null
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

  // handle render form
  let formLogin = $(".container-login100");
  let formRegister = $(".container-register100");
  let formForgot = $(".container-forgot100");

  let loginBtn = $("#login-btn");
  let registerBtn = $("#register-btn");
  let forgotBtn = $("#forgot-btn");

  function showForm(formToShow) {
    formLogin.css("opacity", "0");
    formLogin.css("z-index", "-1");
    formRegister.css("opacity", "0");
    formRegister.css("z-index", "-1");
    formForgot.css("opacity", "0");
    formForgot.css("z-index", "-1");

    formToShow.css("opacity", "1");
    formToShow.css("z-index", "1");
  }
  registerBtn.on("click", function (e) {
    e.preventDefault();
    showForm(formRegister);
  });
  loginBtn.on("click", function (e) {
    e.preventDefault();
    showForm(formLogin);
  });

  forgotBtn.on("click", function (e) {
    e.preventDefault();
    showForm(formForgot);
  });

  let params = new URLSearchParams(window.location.search);
  if (params.has("register")) {
    showForm(formRegister);
  } else {
    showForm(formLogin);
  }

  $(".limiter").css("opacity", "1");
  $(".container-login100").css("opacity", "1");
})(jQuery);

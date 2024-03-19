function handleFileChange(input) {
  if (input.files.length > 0) {
    const reader = new FileReader();
    // Đọc dữ liệu từ tệp hình ảnh
    reader.onload = function (e) {
      $("#img").attr("src", e.target.result);
    };
    // Đọc tệp hình ảnh
    reader.readAsDataURL(input.files[0]);
  } else {
    changeBtnSubmit();
  }
}

// show validate
function showValidate(input) {
  var thisAlert = $(input).parent();

  if (thisAlert) $(thisAlert).addClass("alert-validate");
}

// hide validate
function hideValidate(input) {
  var thisAlert = $(input).parent();

  $(thisAlert).removeClass("alert-validate");
}

$(".form-control").each(function () {
  $(this).focus(function () {
    hideValidate(this);
  });
});

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

// update profile

let inputFormProfile = $("#form-profile input");
$("#form-profile").on("submit", function (e) {
  e.preventDefault();
  let check = validateInput(inputFormProfile);
  if (!check) {
    return check;
  }

  let formData = new FormData();
  formData.append("id", $("#id").val());
  formData.append("fullname", $("#name").val());
  formData.append("email", $("#email").val());
  formData.append("phone", $("#phone").val());
  if ($("#image")[0].files.length > 0) {
    formData.append("image", $("#image")[0].files[0]);
  }

  let url = base_url + "/user/updateProfile";
  updateProfile(formData, url);
});

function updateProfile(data, url) {
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    contentType: false,
    processData: false,
    success: function (data) {
      let message = JSON.parse(data);
      if (message.isUpdateProfile) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: message.msg,
          showConfirmButton: false,
          timer: 1500,
        });
        setTimeout(() => {
          $(".full-name").text($("#name").val());
<<<<<<< HEAD
          $(".account img").attr(
            "src",
            base_url + "/upload/" + message.imagePath
          );
=======
          $(".account img").attr("src", base_url + "/upload/" + message.imagePath);
>>>>>>> 8429f54 ( update)
          $(".error.profile").text("");
        }, 1500);
      } else {
        $(".error.profile").text(message.msg);
      }
    },
  });
}

// change password

let inputFormChangePass = $(".modal-body input");
$("#formChangePassword").on("submit", function (e) {
  e.preventDefault();
  let check = validateInput(inputFormChangePass);
  if (!check) {
    return check;
  }

  if ($("#new_password").val() != $("#confirm_password").val()) {
    $(".error.change-pass").text("Password not match");
    $(".error.change-pass").show();
    return false;
  }

  let data = {};
  let formData = $(".modal-body").serializeArray();
  $.each(formData, function (i, v) {
    data[v.name] = v.value;
  });
  data["id"] = $("#id").val();

  let url = base_url + "/user/changePassword";
  changePassword(data, url);
});

// show modal
let changePassBtn = $("#change_password");
changePassBtn.click(function (e) {
  e.preventDefault();
  $(".modal-container").css("animation", "modalFadeIn ease 0.4s");
  $(".modal-change-pass").addClass("open");
});

$(".js-modal-close").on("click", function () {
  $(".modal-container").css("animation", "fadeOut 0.5s forwards");

  setTimeout(() => {
    $(".modal-change-pass").removeClass("open");
  }, 500);
});

// show password
var showPass = 0;
$(document).on("click", ".btn-show-pass", function () {
  let input = $(this).siblings().filter("input");
  let icon = $(this).find("i");

  if (icon.hasClass("fa-eye")) {
    icon.removeClass("fa-eye");
    icon.addClass("fa-eye-slash");
    input.attr("type", "text");
  } else {
    icon.removeClass("fa-eye-slash");
    icon.addClass("fa-eye");
    input.attr("type", "password");
  }
});

// check current password
function changePassword(data, url) {
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: function (data) {
      let message = JSON.parse(data);
      if (message.isChangePassword) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: message.msg,
          showConfirmButton: false,
          timer: 1500,
        });
        setTimeout(() => {
          $(".modal-change-pass").removeClass("open");
          $('#formChangePassword input[type="password"]').val("");
          $(".error.change-pass").text("");
        }, 1500);
      } else {
        $(".error.change-pass").text(message.msg);
        // $(".error.change-pass").show();
      }
    },
  });
}

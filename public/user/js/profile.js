function handleFileChange(input) {
  if (input.files.length > 0) {
    const reader = new FileReader();
    // Đọc dữ liệu từ tệp hình ảnh
    reader.onload = function (e) {
      $("#img").attr("src", e.target.result);
    };
    // Đọc tệp hình ảnh
    reader.readAsDataURL(input.files[0]);
    btn.prop("disabled", false);
  } else {
    changeBtnSubmit();
  }
}

// show validate
function showValidate(input) {
  var thisAlert = $(input).parent();

  $(thisAlert).addClass("alert-validate");
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
  formData.append("name", $("#name").val());
  formData.append("email", $("#email").val());
  formData.append("phone", $("#phone").val());
  formData.append("image", $("#image")[0].files[0]);

  let url = base_url + "/user/updateProfile";
  console.log("sđwđwđư");
  //   updateProfile(data, url);
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
          position: "top-end",
          icon: "success",
          title: message.msg,
          showConfirmButton: false,
          timer: 2000,
        });
      } else {
        $(".error.login").text(message.msg);
        $(".error.login").show();
      }
    },
  });
}

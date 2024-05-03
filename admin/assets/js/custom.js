$(document).ready(function() {

    $(document).on('click', '.delete_product_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();
        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'product_id':id,
                            'delete_product_btn':true
                        },
                        success: function (response) {
                            if(response == 200) 
                            {
                                swal("Success", "Product deleted successfully!", "success");
                                $("#products_table").load(location.href + " #products_table");
                            }
                            else if(response == 500)
                            {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
          });
    });

    $(document).on('click', '.delete_category_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();
        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'category_id':id,
                            'delete_category_btn':true
                        },
                        success: function (response) {
                            if(response == 200) 
                            {
                                swal("Success", "Category deleted successfully!", "success");
                                $("#category_table").load(location.href + " #category_table");
                            }
                            else if(response == 500)
                            {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
          });
    });

    $(document).on('click', '.delete_brand_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();
        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'brand_id':id,
                            'delete_brand_btn':true
                        },
                        success: function (response) {
                            if(response == 200) 
                            {
                                swal("Success", "Brand deleted successfully!", "success");
                                $("#brand_table").load(location.href + " #brand_table");
                            }
                            else if(response == 500)
                            {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
          });
    });

    $(document).on('click', '.delete_product_sizes_btn', function (e) {
        e.preventDefault();

        let id = $(this).val();
        const array = id.split("|");
        var product_id = array[0];
        var size_id = array[1];

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'product_id':product_id,
                            'size_id':size_id,
                            'delete_product_sizes_btn':true
                        },
                        success: function (response) {
                            if(response == 200) 
                            {
                                swal("Success", "Product Size deleted successfully!", "success");
                                $("#product_sizes_table").load(location.href + " #product_sizes_table");
                            }
                            else if(response == 500)
                            {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
          });
    });
});


const iconNavbarSidenav=document.getElementById("iconNavbarSidenav"),iconSidenav=document.getElementById("iconSidenav"),sidenav=document.getElementById("sidenav-main");let body=document.getElementsByTagName("body")[0],className="g-sidenav-pinned";function toggleSidenav(){body.classList.contains(className)?(body.classList.remove(className),setTimeout(function(){sidenav.classList.remove("bg-white")},100),sidenav.classList.remove("bg-transparent")):(body.classList.add(className),sidenav.classList.add("bg-white"),sidenav.classList.remove("bg-transparent"),iconSidenav.classList.remove("d-none"))}iconNavbarSidenav&&iconNavbarSidenav.addEventListener("click",toggleSidenav),iconSidenav&&iconSidenav.addEventListener("click",toggleSidenav);let referenceButtons=document.querySelector("[data-class]");function navbarColorOnResize(){1200<window.innerWidth?referenceButtons?.classList.contains("active")&&"bg-transparent"===referenceButtons?.getAttribute("data-class")?sidenav.classList.remove("bg-white"):sidenav.classList.add("bg-white"):(sidenav.classList.add("bg-white"),sidenav.classList.remove("bg-transparent"))}function sidenavTypeOnResize(){var e=document.querySelectorAll('[onclick="sidebarType(this)"]');window.innerWidth<1200?e.forEach(function(e){e.classList.add("disabled")}):e.forEach(function(e){e.classList.remove("disabled")})}
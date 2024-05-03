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
                                swal("Success", "Product deleted successfully!", "success");
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
function paging(data, url) {
  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: data,
    success: function (data) {
      $(".product-container").empty();
      $(".product-container").html(data);
      redirectProductDetail();
    },
    error: function () {},
  });
}

function pagingFilter(data, url) {
  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: data,
    success: function (data) {
      $(".product-container").empty();
      $("#pagination").remove();
      if (data == "") {
        data = "<h5>No products found.</h5>";
        $(".product-container").html(data);
      } else {
        $(".product-container").html(data);
        let paging = `<ul class="pagination justify-content-center" id="pagination"></ul>
                    <script src="${base_url}/public/user/js/jquery.twbsPagination.js"></script>
                    <script src="${base_url}/public/user/js/paging.js"></script>`;
        $("#paging").html(paging);
        // initPagination();
      }
    },
    error: function () {},
  });
}

function getDataFilters(page, limit) {
  let keyword = $("#keyword").val();

  let categoryId = parseInt(
    $(".sidebar_categories li.active").attr("data-value")
  );

  let brandIds = [];
  $(".checkboxes.brands li").each(function () {
    if ($(this).hasClass("active")) {
      let value = $(this).attr("data-value");
      brandIds.push(value);
    }
  });

  let sizeIds = [];
  $(".checkboxes.sizes li").each(function () {
    if ($(this).hasClass("active")) {
      let value = $(this).attr("data-value");
      sizeIds.push(value);
    }
  });

  let price = $("#amount").val();
  var parts = price.split(" - ");
  var priceInRange = [
    parseInt(parts[0].replace("$", "")),
    parseInt(parts[1].replace("$", "")),
  ];

  let sortBy = $(".type_sorting_text").text();

  let data = {
    page: page,
    limit: limit,
    keyword: keyword,
    categoryId: categoryId,
    brandIds: brandIds,
    sizeIds: sizeIds,
    priceInRange: priceInRange,
    sortBy: sortBy,
  };
  return data;
}

function initPagination() {
  totalPage = parseInt($("#totalPage").val());
  let currentPage = 1;
  let limit = parseInt($("#limit").text());
  console.log(limit);
  window.pagObj = $("#pagination").twbsPagination({
    totalPages: totalPage,
    visiblePages: 5,
    startPage: currentPage,
    onPageClick: function (event, page) {
      if (page !== currentPage) {
        let data = getDataFilters(page - 1, limit);
        scrollPage();
        currentPage = page;
        paging(data, url_page);
      }
    },
  });
}

function scrollPage() {
  const docEL = document.documentElement;
  docEL.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

function redirectProductDetail() {
  $(".product").on("click", function (e) {
    var dataValue = $(this).closest(".product-item").data("value");
    // console.log(dataValue);
    window.location.href = base_url + "/product/detail/" + dataValue;
  });
}

$(function () {
  redirectProductDetail();
  initPagination();
});

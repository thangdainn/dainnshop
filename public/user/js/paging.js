function autoClickTagA() {
  var link = document.getElementById("loadPage");
  var clickEvent = new MouseEvent("click", {
    view: window,
    bubbles: true,
    cancelable: false,
  });
  link.dispatchEvent(clickEvent);
}

function paging(data, url) {
  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: data,
    success: function (data) {
      $(".product-container").empty();
      $(".product-container").html(data);
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
      $(".product-container").html(data);
      let paging = `<ul class="pagination justify-content-center" id="pagination"></ul>
                    <script src="${base_url}/public/user/js/jquery.twbsPagination.js"></script>`;
      $("#paging").html(paging);

      initPagination();
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

  let data = {
    page: page,
    limit: limit,
    keyword: keyword,
    categoryId: categoryId,
    brandIds: brandIds,
    sizeIds: sizeIds,
  };
  return data;
}

function initPagination() {
  totalPage = parseInt($("#totalPage").val());
  let currentPage = 1;
  let limit = parseInt($("#limit").val());
  window.pagObj = $("#pagination").twbsPagination({
    totalPages: totalPage,
    visiblePages: 5,
    startPage: currentPage,
    onPageClick: function (event, page) {
      if (page !== currentPage) {
        let data = getDataFilters(page - 1, limit);
        autoClickTagA();
        currentPage = page;
        paging(data, url_page);
      }
    },
  });
}

$(function () {
  initPagination();
});

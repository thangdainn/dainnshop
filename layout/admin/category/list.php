<div class="right_col" role="main">
    <div class="">
        <div class="row" style="display: block;">
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 float-none">

                <!--                alert message-->
                <!-- <div id="alert-container-success" style="position: fixed; right: 1px; z-index: 1000">
                    <div class="alert alert-success" th:if="${param.success}">Successfully!!!</div>
                </div>
                <div id="alert-container" style="position: fixed; right: 1px; z-index: 1000">
                </div> -->

                <div class="x_panel">
                    <div class="x_title row" th:object="${categories}">
                        <h2 class="col-md-2">Category List</h2>
                        <form th:action="@{/category/list}" id="form-submit" data-parsley-validate class="col-md-8 form-horizontal form-label-left" method="get">
                            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                <div class="input-group">
                                    <input id="search" th:field="*{keyword}" type="text" name="keyword" class="form-control" placeholder="Enter Name...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit">Search</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-2">
                            <a href="/category/add" style="color: white" class="btn btn-round btn-primary">Add</a>
                            <button id="btnDelete" type="button" style="color: white" class="btn btn-round btn-danger">
                                Delete
                            </button>
                        </div>
                        <form action="" id="formSubmit" method="get">
                            <input type="hidden" th:field="*{page}" id="page" name="page">
                            <input type="hidden" th:field="*{keyword}" id="keyword" name="keyword">
                        </form>
                    </div>
                    <!--                    <div class="clearfix"></div>-->

                    <div class="x_content">

                        <!--                        <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                        <div th:if="${#lists.size(categories.listResult) == 0}">
                            <h2>No Items</h2>
                        </div>
                        <div th:unless="${#lists.size(categories.listResult) == 0}" class="table-responsive overflow-hidden">
                            <div style="min-height: 67vh">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title">No</th>
                                        <th class="column-title">Name</th>
                                        <th class="column-title">Code</th>
                                        <th class="column-title">Description</th>
                                        <th class="column-title">Created Date</th>
                                        <!--                                    <th class="column-title">Ngày sửa</th>-->
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;"><span
                                                    class="action-cnt"> </span></a>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr class="even pointer" th:each="category, stat : ${categories.listResult}">
                                        <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records"
                                                   th:value="${category.id}">
                                        </td>
                                        <td class=" " th:text="${(categories.page - 1) * categories.size + stat.index + 1}"></td>
                                        <td class=" " th:text="${category.name}"></td>
                                        <td class=" " th:text="${category.code}"></td>
                                        <td class=" " th:text="${category.description}"></td>
                                        <td class=" " th:text="${category.createdDate}"></td>
                                        <!--                                    <td class="a-right a-right ">$7.45</td>-->
                                        <td class=" last"><a th:href="@{'/category/edit/' + ${category.code}}"
                                                             class="btn btn-round btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination justify-content-center" id="pagination"></ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script th:inline="javascript">
        let cateURL = '/category/list';
        $('formSubmit').attr('action', cateURL);
        let currentPage = [[${categories.page}]];
        let totalPage = [[${categories.totalPage}]];
        $(function () {
            window.pagObj = $('#pagination').twbsPagination({
                totalPages: totalPage,
                visiblePages: 5,
                startPage: currentPage,
                onPageClick: function (event, page) {
                    if (page !== currentPage) {
                        $('#page').val(page - 1);
                        removeEmptyInputs('formSubmit');
                        $('#formSubmit').submit();
                    }
                }
            })
        });
        $(document).ready(function () {
            let alertContainer = $("#alert-container-success");
            if (alertContainer.length) {
                setTimeout(function () {
                    alertContainer.remove();
                }, 3000);
            }
        });
        $('#btnDelete').click(() => {
            let ids = $('tbody input[type=checkbox]:checked').map(function () {
                return $(this).val();
            }).get();
            deleteCategory(ids);
        })

        function deleteCategory(ids) {
            $.ajax({
                url: '/category',
                type: 'DELETE',
                headers: {
                  'Authorization': `Bearer ${localStorage.getItem("token")}`,
                },
                contentType: 'application/json',
                data: JSON.stringify(ids),
                success: function (result) {
                    window.location.href = cateURL + "?success";
                },
                error: function (xhr) {
                    if (xhr.status === 400) {
                        let errorMessages = JSON.parse(xhr.responseText);
                        let error = "";
                        errorMessages.forEach(function (errorMessage) {
                            error += errorMessage + "\n";
                        });
                        toast({message: error, type: "danger"})
                    }
                }
            })
        }

        function toast({message = "", type = "error"}) {
            let alertContainer = $("#alert-container");
            if (alertContainer.length) {
                const toast = $("<div></div>");
                toast.addClass(`alert alert-${type}`);
                toast.css("animation", "slideInLeft ease 0.3s, fadeOut linear 1s 2s forwards");
                toast.css("white-space", "pre-wrap");
                toast.text(message);
                alertContainer.append(toast);

                setTimeout(function () {
                    toast.remove();
                }, 3000);
            }
        }

        function removeEmptyInputs(formId) {
            $('#' + formId + ' input[type="hidden"]').each(function () {
                if ($(this).val() === '') {
                    $(this).remove();
                }
            });
        }
    </script> -->
</div>
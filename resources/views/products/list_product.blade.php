@extends('layouts.master')
@section('main-content')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
@endsection

<div class="breadcrumb">
    <h1>{{ __('translate.Products') }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_product_list">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="text-end mb-3">
                    @can('products_add')
                        <a href="/products/products/create" class=" btn btn-outline-primary btn-md m-1">
                            <i class="i-Add me-2 font-weight-bold"></i>{{ __('translate.Create') }}
                        </a>
                        <a class="import_product btn btn-outline-primary btn-md m-1"><i
                                class="i-Upload me-2 font-weight-bold"></i>
                            {{ __('translate.ImportExcel') }}
                        </a>
                    @endcan
                    <a class="btn btn-outline-success btn-md m-1" id="Show_Modal_Filter"><i
                            class="i-Filter-2 me-2 font-weight-bold"></i>
                        {{ __('translate.Filter') }}</a>
                </div>

                <div class="table-responsive text-nowrap">
                    <table id="product_table" class="display table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('translate.Image') }}</th>
                                <th>{{ __('translate.type') }}</th>
                                <th>{{ __('translate.Name') }}</th>
                                <th>{{ __('translate.Code') }}</th>
                                <th>{{ __('translate.Category') }}</th>
                                <th>{{ __('translate.Product_Cost') }}</th>
                                <th>{{ __('translate.Product_Price') }}</th>
                                <th>{{ __('translate.Current_Stock') }}</th>
                                <th class="not_show">{{ __('translate.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Filter -->
    <div class="modal fade" id="filter_products_modal" tabindex="-1" role="dialog"
        aria-labelledby="filter_products_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('translate.Filter') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" id="filter_products">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="code">{{ __('translate.Code_Product') }}
                                </label>
                                <input type="text" class="form-control" name="code" id="code"
                                    placeholder="{{ __('translate.Code_Product') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name">{{ __('translate.Product_Name') }}
                                </label>
                                <input type="text" class="form-control" name="name" id="product_name"
                                    placeholder="{{ __('translate.Product_Name') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">{{ __('translate.Category') }}
                                </label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="0">{{ __('translate.All') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="brand_id">{{ __('translate.Brand') }}
                                </label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="0">{{ __('translate.All') }}</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="i-Filter-2 me-2 font-weight-bold"></i> {{ __('translate.Filter') }}
                                </button>
                                <button id="Clear_Form" class="btn btn-danger">
                                    <i class="i-Power-2 me-2 font-weight-bold"></i> {{ __('translate.Clear') }}
                                </button>
                            </div>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="import_product_modal" tabindex="-1" role="dialog"
        aria-labelledby="import_product_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('translate.import_products_modal') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productImport" action="{{ route('products.import.process') }}" method="post">
                        <div class="row">
                            <!-- Date -->
                            <div class="col-12">
                                <div class="alert alert-warning" role="alert">
                                    Silahkan unduh template file Excel <a
                                        href="{{ asset('customer_template_simseka.xlsx') }}"
                                        class="alert-link">disini</a> untuk melakukan proses impor data
                                    produk.
                                </div>
                            </div>
                            <div class="col-12">

                            </div>
                            <div class="col-md-12">
                                <validation-provider name="product" rules="required" v-slot="validationContext">
                                    <div class="form-group">
                                        <label for="excel">{{ __('translate.ExcelFile') }}</label>
                                        <input name="file" type="file" class="form-control" id="file">
                                        <span class="file-error-notif text-danger" id="file-error"></span>
                                    </div>
                                </validation-provider>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary" id="product-submit-btn">
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                    <i class="i-Yes me-2 font-weight-bold"></i>
                                    {{ __('translate.Submit') }}
                                </button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js')
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/nprogress.js') }}"></script>

<script type="text/javascript">
    function duplicateProduct(id = '')
    {
        console.log(id);
        swal({
            title: '{{ __('translate.Duplicate_data') }}',
            text: '{{ __('translate.Data_will_be_duplicated') }}',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: '{{ __('translate.Yes_duplicate_it') }}',
            cancelButtonText: '{{ __('translate.No_cancel') }}',
            confirmButtonClass: 'btn btn-primary me-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function() {
            axios
                .post("/products/products/" + id +"/duplicate")
                .then(() => {
                    toastr.success('{{ __('translate.Duplicated_in_successfully') }}');
                    $('#product_table').DataTable().ajax.reload();
                })
                .catch(errors => {
                    if(errors.response.status = 422) {
                        toastr.error(errors.response.data.msg);
                    }
                });
        });
    }

    $(function() {
        "use strict";
        $(document).ready(function() {
            //init datatable
            product_datatable();
        });

        //Get Data
        function product_datatable(name = '', category_id = '', brand_id = '', code = '') {
            var table = $('#product_table').DataTable({
                processing: true,
                serverSide: true,
                "order": [
                    [0, "desc"]
                ],
                'columnDefs': [{
                        'targets': [0],
                        'visible': false,
                        'searchable': false,
                    },
                    {
                        'targets': [1, 2, 5, 6, 7, 8, 9],
                        "orderable": false,
                    },
                ],

                ajax: {
                    url: "{{ route('products_datatable') }}",
                    data: {
                        name: name === null ? '' : name,
                        category_id: category_id == '0' ? '' : category_id,
                        brand_id: brand_id == '0' ? '' : brand_id,
                        code: code === null ? '' : code,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    type: "post"
                },

                columns: [{
                        data: 'id',
                        className: "d-none"
                    },
                    {
                        data: 'image'
                    },
                    {
                        data: 'type'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'code'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'cost'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'quantity'
                    },
                    {
                        data: 'action'
                    },

                ],

                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                dom: "<'row'<'col-sm-12 col-md-7'lB><'col-sm-12 col-md-5 p-0'f>>rtip",
                oLanguage: {
                    sEmptyTable: "{{ __('datatable.sEmptyTable') }}",
                    sInfo: "{{ __('datatable.sInfo') }}",
                    sInfoEmpty: "{{ __('datatable.sInfoEmpty') }}",
                    sInfoFiltered: "{{ __('datatable.sInfoFiltered') }}",
                    sInfoThousands: "{{ __('datatable.sInfoThousands') }}",
                    sLengthMenu: "_MENU_",
                    sLoadingRecords: "{{ __('datatable.sLoadingRecords') }}",
                    sProcessing: "{{ __('datatable.sProcessing') }}",
                    sSearch: "",
                    sSearchPlaceholder: "{{ __('datatable.sSearchPlaceholder') }}",
                    oPaginate: {
                        sFirst: "{{ __('datatable.oPaginate.sFirst') }}",
                        sLast: "{{ __('datatable.oPaginate.sLast') }}",
                        sNext: "{{ __('datatable.oPaginate.sNext') }}",
                        sPrevious: "{{ __('datatable.oPaginate.sPrevious') }}",
                    },
                    oAria: {
                        sSortAscending: "{{ __('datatable.oAria.sSortAscending') }}",
                        sSortDescending: "{{ __('datatable.oAria.sSortDescending') }}",
                    }
                },
                buttons: [{
                    extend: 'collection',
                    text: "{{ __('translate.EXPORT') }}",
                    buttons: [{
                            extend: 'print',
                            text: 'print',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'pdf',
                            text: 'pdf',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'excel',
                            text: 'excel',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'csv',
                            text: 'csv',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                        },
                    ]
                }]

            });
        }

        // Clear Filter
        $('#Clear_Form').on('click', function(e) {
            var name = $('#product_name').val('');
            let category_id = $('#category_id').val('0');
            let brand_id = $('#brand_id').val('0');
            var code = $('#code').val('');

        });

        $(document).on('click', '.import_product', function(e) {
            NProgress.start();
            setTimeout(() => {
                NProgress.done();
                $('#import_product_modal').modal('show');
            }, 1000);
        });


        // Show Modal Filter
        $('#Show_Modal_Filter').on('click', function(e) {
            $('#filter_products_modal').modal('show');
        });


        // Submit Filter
        $('#filter_products').on('submit', function(e) {
            e.preventDefault();
            var name = $('#product_name').val();
            let category_id = $('#category_id').val();
            let brand_id = $('#brand_id').val();
            var code = $('#code').val();

            $('#product_table').DataTable().destroy();
            product_datatable(name, category_id, brand_id, code);

            $('#filter_products_modal').modal('hide');

        });

        $(document).on('click', '.import_product', function(e) {
            NProgress.start();
            setTimeout(() => {
                NProgress.done();
                $('#import_user_modal').modal('show');
            }, 1000);
        });

        // event reload Datatatble
        $(document).bind('event_product', function(e) {
            $('#product_table').DataTable().destroy();
            product_datatable();
        });

        //Delete Category
        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');
            // app.Remove_product(id);
            Remove_product(id);
        });

        const Remove_product = (id) => {
            swal({
                title: '{{ __('translate.Are_you_sure') }}',
                text: '{{ __('translate.You_wont_be_able_to_revert_this') }}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: '{{ __('translate.Yes_delete_it') }}',
                cancelButtonText: '{{ __('translate.No_cancel') }}',
                confirmButtonClass: 'btn btn-primary me-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function() {
                axios
                    .delete("/products/products/" + id)
                    .then(() => {
                        toastr.success('{{ __('translate.Deleted_in_successfully') }}');
                        $('#product_table').DataTable().ajax.reload();
                    })
                    .catch(() => {
                        toastr.error('{{ __('translate.There_was_something_wronge') }}');
                    });
            });
        };

        //Import process
        $("#productImport").submit((e) => {
            e.preventDefault();
            NProgress.start();
            NProgress.set(0.1);
            var form = $('#productImport')[0];
            var formData = new FormData(form);
            var url = $('#productImport').attr('action');
            $('.spinner-border').removeClass('d-none');
            $('.i-Yes').addClass('d-none');
            $('#product-submit-btn').attr('disabled', 'disabled');
            axios
                .post(url,
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                .then(response => {
                    toastr.success('{{ __('translate.Created_in_successfully') }}');
                    $('#import_user_modal').modal('hide');
                    $('#product_table').DataTable().ajax.reload();
                    $('.spinner-border').addClass('d-none');
                    $('.i-Yes').removeClass('d-none');
                    $('#product-submit-btn').removeAttr('disabled', 'disabled');
                    NProgress.done();
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        swal({
                            title: 'Oops',
                            text: '{{ __('translate.There_was_something_wronge') }}',
                            type: 'error',
                        }).then(function() {
                            jQuery.each(error.response.data.errors, function(key, value) {
                                $("." + key + "-error-notif").text('');
                                $("#" + key + "-error").text(value[0]);
                            });
                        });
                    }
                    $('#product-submit-btn').removeAttr('disabled', 'disabled');
                    $('.spinner-border').addClass('d-none');
                    $('.i-Yes').removeClass('d-none');
                    NProgress.done();
                });
        });
    });
</script>
@endsection

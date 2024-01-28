@extends('layouts.master')
@section('main-content')
    @section('page-css')
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/flatpickr.min.css') }}">
    @endsection

    <div class="breadcrumb">
        <h1>Post</h1>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row" id="section_Client_list">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <a class="btn btn-outline-primary btn-md m-1" href="{{ route('post.create') }}"><i
                                class="i-Add me-2 font-weight-bold"></i>Create</a>
                    </div>
                    <div class="table-responsive">
                        <table id="post_list_table" class="display table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('translate.Title') }}</th>
                                <th>{{ __('translate.Status') }}</th>
                                <th>{{ __('translate.Type') }}</th>
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
    </div>
@endsection
@section('page-js')
    <script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/nprogress.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>

    <script type="text/javascript">
        $(function(){
            "use strict";

            $(document).ready(function () {
                //init datatable
                post_datatable();
            });

            //Delete Category
            $(document).on('click', '.delete', function() {
                var id = $(this).attr('id');
                // app.Remove_product(id);
                Remove_post(id)
            });

            const Remove_post = (id) => {
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
                        .delete("/post/delete/" + id)
                        .then(() => {
                            toastr.success('{{ __('translate.Deleted_in_successfully') }}');
                            $('#post_list_table').DataTable().ajax.reload();
                        })
                        .catch(() => {
                            toastr.error('{{ __('translate.There_was_something_wronge') }}');
                        });
                });
            };

            //Get Data
            function post_datatable() {
                var table = $('#post_list_table').DataTable({
                    processing: true,
                    serverSide: true,
                    "order": [[ 0, "desc" ]],
                    'columnDefs': [
                        {
                            'targets': [0],
                            'visible': false,
                            'searchable': false,
                        },
                    ],
                    ajax: "{{ route('post.index') }}",
                    columns: [
                        {data: 'id', name: 'id',className: "d-none"},
                        {data: 'title', name: 'title'},
                        {
                            data: 'is_active',
                            render: function (data, type, row) {
                                let status = data === 1 ? 'Active' : 'Disabled';
                                let style = data === 1 ? 'success' : 'danger';
                                return `<span class="badge bg-` + style + `">` + status + `</span>`;
                            }
                        },
                        {data: 'category', name: 'category'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],

                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
                    buttons: [
                        {
                            extend: 'collection',
                            text: "{{ __('translate.EXPORT') }}",
                            buttons: [
                                {
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

            // event reload Datatatble
            $(document).bind('event_client', function (e) {
                $('#post_list_table').DataTable().destroy();
                post_datatable();
            });
        });
    </script>
@endsection

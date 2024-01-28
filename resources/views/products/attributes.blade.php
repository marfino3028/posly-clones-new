@extends('layouts.master')
@section('main-content')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/nprogress.css')}}">
@endsection

<div class="breadcrumb">
  <h1>{{ __('translate.Attributes') }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>


<div class="row" id="section_Attributes_list">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="text-end mb-3">
          <a class="new_attributes btn btn-outline-primary btn-md m-1"><i class="i-Add me-2 font-weight-bold"></i>
            {{ __('translate.Create') }}</a>
        </div>
        <div class="table-responsive">
          <table id="attributes_table" class="display table">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('translate.Name') }}</th>
                <th>{{ __('translate.Code') }}</th>
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
  <!-- Modal Add & Edit Attribute -->
  <div class="modal fade" id="modal_attributes" tabindex="-1" role="dialog" aria-labelledby="modal_attributes" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 v-if="editmode" class="modal-title">{{ __('translate.Edit') }}</h5>
          <h5 v-else class="modal-title">{{ __('translate.Create') }}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form @submit.prevent="editmode?Update_Attributes():Create_Attributes()" enctype="multipart/form-data">
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="name">{{ __('translate.Name') }} <span class="field_required">*</span></label>
                    <input type="text" v-model="attribute.variant_name" class="form-control" name="variant_name" id="variant_name"
                    placeholder="{{ __('translate.Enter_Attribute_Name') }}">
                    <span class="error" v-if="errors && errors.variant_name">
                    @{{ errors.name[0] }}
                    </span>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="name">{{ __('translate.Code') }} <span class="field_required">*</span></label>
                    <input type="text" v-model="attribute.variant_code" class="form-control" name="variant_code" id="variant_code"
                    placeholder="{{ __('translate.Enter_Attribute_Code') }}">
                    <span class="error" v-if="errors && errors.variant_code">
                    @{{ errors.code[0] }}
                    </span>
                </div>

            </div>
            <div class="row mt-3">

              <div class="col-md-6">
                <button type="submit" class="btn btn-primary" :disabled="SubmitProcessing">
                  <span v-if="SubmitProcessing" class="spinner-border spinner-border-sm" role="status"
                    aria-hidden="true"></span> <i class="i-Yes me-2 font-weight-bold"></i> {{ __('translate.Submit') }}
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

<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/nprogress.js')}}"></script>

<script type="text/javascript">
  $(function () {
      "use strict";

        $(document).ready(function () {
          //init datatable
          Attributes_datatable();
        });

        //Get Data
        function Attributes_datatable(){
            var table = $('#attributes_table').DataTable({
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
                ajax: "{{ route('attributes.index') }}",
                columns: [
                    {data: 'id', name: 'id',className: "d-none"},
                    {data: 'attribute_code', name: 'attribute_code'},
                    {data: 'attribute_name', name: 'attribute_name'},
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
        $(document).bind('event_attributes', function (e) {
            $('#modal_attributes').modal('hide');
            $('#attributes_table').DataTable().destroy();
            Attributes_datatable();
        });


         //Create Attributes
         $(document).on('click', '.new_attributes', function () {
            NProgress.start();
            NProgress.set(0.1);
            app.editmode = false;
            app.reset_Form();
            app.Get_Data_Create();
            setTimeout(() => {
                NProgress.done()
                $('#modal_attributes').modal('show');
            }, 500);
        });

        //Edit Attributes
        $(document).on('click', '.edit', function () {

            NProgress.start();
            NProgress.set(0.1);
            app.editmode = true;
            app.reset_Form();
            var id = $(this).attr('id');
            app.Get_Data_Edit(id);

            setTimeout(() => {
                NProgress.done()
                $('#modal_attributes').modal('show');
            }, 1000);
        });

        //Delete Attributes
        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            app.Remove_Attributes(id);
        });
    });
</script>

<script>
  Vue.component('v-select', VueSelect.VueSelect)
        var app = new Vue({
        el: '#section_Attributes_list',
        data: {
            SubmitProcessing:false,
            errors:[],
            attributes: [],
            editmode: false,
            attribute: {
                id: "",
                variant_name: "",
                variant_code: "",
            }
        },

        methods: {

            //---------------------- Get_Data_Create  ------------------------------\\
            Get_Data_Create() {
                axios
                .get("/products/variant/attributes/create")
                .then(response => {
                    this.attributes   = response.data.attribute;
                })
                .catch(error => {

                });
            },

            //---------------------- Get_Data_Edit  ------------------------------\\
            Get_Data_Edit(id) {
                axios
                .get("/products/variant/attributes/"+id+"/edit")
                .then(response => {
                    this.attribute   = response.data.attribute;
                })
                .catch(error => {

                });
            },

             //------------------------------ reset Form ------------------------------\\
            reset_Form() {
                this.attribute = {
                    id: "",
                    variant_name: "",
                    variant_code: "",
                };
                this.errors = {};
            },

            //------------------------ Create_Attribute s---------------------------\\
            Create_Attributes() {
                var self = this;
                self.SubmitProcessing = true;
                axios
                .post("/products/variant/attributes", {
                    variant_name: self.attribute.variant_name,
                    variant_code: self.attribute.variant_code
                    })
                    .then(response => {
                        self.SubmitProcessing = false;
                        $.event.trigger('event_attribute');
                        toastr.success('{{ __('translate.Created_in_successfully') }}');
                        self.errors = {};
                        $('#modal_attributes').modal('hide');
                        $('#attributes_table').DataTable().ajax.reload();
                })
                .catch(error => {
                    self.SubmitProcessing = false;
                    if (error.response.status == 422) {
                        self.errors = error.response.data.errors;
                    }
                    toastr.error('{{ __('translate.There_was_something_wronge') }}');
                });
            },

           //----------------------- Update_Attribute ---------------------------\\
           Update_Attributes(){
                var self = this;
                self.SubmitProcessing = true;
                axios.put("/products/variant/attributes/" + self.attribute.id, {
                    variant_name: self.attribute.variant_name,
                    variant_code: self.attribute.variant_code
                })
                .then(response => {
                        self.SubmitProcessing = false;
                        $.event.trigger('event_attribute');
                        toastr.success('{{ __('translate.Updated_in_successfully') }}');
                        self.errors = {};
                        $('#modal_attributes').modal('hide');
                        $('#attributes_table').DataTable().ajax.reload();
                    })
                    .catch(error => {
                        self.SubmitProcessing = false;
                        if (error.response.status == 422) {
                            self.errors = error.response.data.errors;
                        }
                        toastr.error('{{ __('translate.There_was_something_wronge') }}');
                    });
            },

             //--------------------------------- Remove_Attributes ---------------------------\\
             Remove_Attributes(id) {

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
                }).then(function () {
                    axios.delete("/products/variant/attributes/" + id)
                    .then(response => {
                        if (response.data.success) {
                            toastr.success('{{ __('translate.Deleted_in_successfully') }}');
                            $.event.trigger('event_attribute');
                            $('#modal_attributes').modal('hide');
                            $('#attributes_table').DataTable().ajax.reload();
                        } else {
                            toastr.error('{{ __('translate.There_was_something_wronge') }}');
                        }
                    })
                    .catch(() => {
                        toastr.error('{{ __('translate.There_was_something_wronge') }}');
                    });
                });

            },



        },
        //-----------------------------Autoload function-------------------
        created() {
        }

    })

</script>



@endsection

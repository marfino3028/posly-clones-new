@extends('layouts.master')
@section('main-content')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/nprogress.css')}}">
@endsection

<div class="breadcrumb">
  <h1>{{ __('translate.Attributes') }} - {{ $attribute }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>


<div class="row" id="section_Attributes_Value_list">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="text-end mb-3">
          <a class="new_attributes_value btn btn-outline-primary btn-md m-1"><i class="i-Add me-2 font-weight-bold"></i>
            {{ __('translate.Create') }}</a>
        </div>
        <div class="table-responsive">
          <table id="attributes_value_table" class="display table" aria-label="Table attribute value">
            <thead>
              <tr>
                <th>ID</th>
                <th>{{ __('translate.AttributeName') }}</th>
                <th>{{ __('translate.AttributeValueCode') }}</th>
                <th>{{ __('translate.AttributeValueName') }}</th>
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
  <div class="modal fade" id="modal_attributes_value" tabindex="-1" role="dialog"
  aria-labelledby="modal_attributes_value" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 v-if="editmode" class="modal-title">{{ __('translate.Edit') }} - {{ $attribute }}</h5>
          <h5 v-else class="modal-title">{{ __('translate.Create') }} -  {{ $attribute }}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form
          @submit.prevent="editmode?Update_Attributes_Value():Create_Attributes_Value()"
          enctype="multipart/form-data"
          >
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="name">{{ __('translate.Code') }} <span class="field_required">*</span></label>
                    <input type="hidden" v-model="attributeValue.attributeId" id="attribute_id" name="attribute_id">
                    <input type="text" v-model="attributeValue.code" class="form-control" name="code"
                    id="code" placeholder="{{ __('translate.Enter_Attribute_Value_Code') }}">
                    <span class="error" v-if="errors && errors.code">
                    @{{ errors.code[0] }}
                    </span>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="name">{{ __('translate.Name') }} <span class="field_required">*</span></label>
                    <input type="text" v-model="attributeValue.name" class="form-control" name="name"
                    id="name" placeholder="{{ __('translate.Enter_Attribute_Value_Name') }}">
                    <span class="error" v-if="errors && errors.name">
                    @{{ errors.name[0] }}
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
          Attributes_value_datatable();
        });

        //Get Data
        function Attributes_value_datatable(){
            var url = "{{ route('attributes.value.dataTables', ':id') }}";
            url = url.replace(':id', `{{ $id }}`);
            var table = $('#attributes_value_table').DataTable({
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
                ajax: url,
                columns: [
                    {data: 'id', name: 'id',className: "d-none"},
                    {data: 'attribute_name', name: 'attribute_name'},
                    {data: 'attribute_value_code', name: 'attribute_value_code'},
                    {data: 'attribute_value_name', name: 'attribute_value_name'},
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
        $(document).bind('event_attributes_value', function (e) {
            $('#modal_attributes_value').modal('hide');
            $('#attributes_value_table').DataTable().destroy();
            Attributes_value_datatable();
        });


         //Create Attributes
         $(document).on('click', '.new_attributes_value', function () {
            app.editmode = false;
            app.reset_Form();
            $('#modal_attributes_value').modal('show');
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
                $('#modal_attributes_value').modal('show');
            }, 1000);
        });

        //Delete Attributes
        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            var attributeId = `{{ $id }}`;
            app.Remove_Attributes_Value(attributeId, id);
        });
    });
</script>

<script>
var app = new Vue({
    el: '#section_Attributes_Value_list',
    data: {
        SubmitProcessing: false,
        errors: [],
        attributeValues: [],
        editmode: false,
        attributeValue: {
            attributeId: "",
            id: "",
            code: "",
            name: ""
        }
    },

    methods: {
        //--------------------------- reset Form ----------------\\
        reset_Form() {
            this.attributeValue = {
                attributeId: "{{ $id }}",
                code: "",
                name: "",
            };

            this.errors = {};
        },

        //--------------------------- Create Attribute Value ----------------\\
        Create_Attributes_Value() {
            var self = this;
            self.SubmitProcessing = true;
            var attrId = self.attributeValue.attributeId;
            axios.post("/products/variant/values/" + attrId + "/store", {
                code: self.attributeValue.code,
                name: self.attributeValue.name
                })
                .then(response => {
                    self.SubmitProcessing = false;
                    $.event.trigger('event_attributes_value');
                    toastr.success('{{ __('translate.Created_in_successfully') }}');
                    self.errors = {};
                    $('#modal_attributes_value').modal('hide');
                    $('#attributes_value_table').DataTable().ajax.reload();
            })
            .catch(error => {
                self.SubmitProcessing = false;
                if (error.response.status == 422) {
                    self.errors = error.response.data.errors;
                }
                toastr.error('{{ __('translate.There_was_something_wronge') }}');
            });
        },

        //---------------------- Get_Data_Edit  ------------------------------\\
        Get_Data_Edit(id) {
            var self = this;
            var attrId = self.attributeValue.attributeId;
            axios
            .get("/products/variant/values/"+attrId+"/"+id+"/edit")
            .then(response => {
                this.attributeValue.id = response.data.attributeValues.id;
                this.attributeValue.code = response.data.attributeValues.variant_attribute_value_code;
                this.attributeValue.name = response.data.attributeValues.variant_attribute_value_name;
            })
            .catch(error => {

            });
        },

        //----------------------- Update_Attribute_value ---------------------------\\
        Update_Attributes_Value() {
            var self = this;
            self.SubmitProcessing = true;
            var attrId = self.attributeValue.attributeId;
            axios
                .put("/products/variant/values/" + this.attributeValue.attributeId + "/" + this.attributeValue.id, {
                    code: this.attributeValue.code,
                    name: this.attributeValue.name,
                })
                .then(response => {
                    self.SubmitProcessing = false;
                    $.event.trigger('event_attributes_value');
                    toastr.success('{{ __('translate.Updated_in_successfully') }}');
                    self.errors = {};
                    $('#modal_attributes_value').modal('hide');
                    $('#attributes_value_table').DataTable().ajax.reload();
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
        Remove_Attributes_Value(attributeId, id) {
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
                axios.delete("/products/variant/values/" + attributeId + "/delete/" + id)
                .then(response => {
                    if (response.data.success) {
                        toastr.success('{{ __('translate.Deleted_in_successfully') }}');
                        $.event.trigger('event_attribute');
                        $('#modal_attributes_value').modal('hide');
                        $('#attributes_value_table').DataTable().ajax.reload();
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
})
</script>
@endsection

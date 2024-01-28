@extends('layouts.master')
@section('main-content')
    @section('page-css')
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/nprogress.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datepicker.min.css') }}">
    @endsection

    <div class="breadcrumb">
        <h1>{{ __('translate.Add_Post') }}</h1>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <!-- begin::main-row -->
    <div class="row" id="section_create_post">
        <div class="col-lg-12 mb-3">

            <!--begin::form-->
            <form @submit.prevent="Create_Post()">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="title">{{ __('translate.Title') }} <span
                                        class="field_required">*</span></label>
                                <input type="text" class="form-control" id="title"
                                       placeholder="{{ __('translate.Enter_Title') }}" v-model="post.title">
                                <span class="error" v-if="errors && errors.title">
                                @{{ errors.title[0] }}
                            </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>{{ __('translate.Category') }} <span class="field_required">*</span></label>
                                <v-select placeholder="{{ __('translate.Choose_Category') }}" v-model="post.category"
                                          :reduce="(option) => option.value"
                                          :options="[
                                    { label: 'Articles', value: 'articles' },
                                    { label: 'Static Page', value: 'static-page' }
                                ]">
                                </v-select>

                                <span class="error" v-if="errors && errors.category">
                                @{{ errors.category[0] }}
                            </span>
                            </div>

                            <div class="form-group col-md-4">
                                <label>{{ __('translate.Status') }} </label>
                                <v-select placeholder="{{ __('translate.Status') }}" v-model="post.status"
                                          :reduce="(option) => option.value"
                                          :options="[
                                    { label: 'Active', value: '1' },
                                    { label: 'Disabled', value: '0' }
                                ]">
                                </v-select>

                                <span class="error" v-if="errors && errors.status">
                                @{{ errors.status[0] }}
                            </div>

                            <div class="form-group col-md-4">
                                <template v-if="preview" class="mb-4">
                                    <img :src="preview" class="img-fluid w-100" />
                                </template>
                                <label for="image">{{ __('translate.Image') }} </label>
                                <input name="image" @change="onFileSelected" type="file" class="form-control"
                                       id="image">
                                <span class="error" v-if="errors && errors.image">
                                @{{ errors.image[0] }}
                            </span>
                            </div>

                            <div class="form-group col-md-12 mb-4">
                                <label for="note">{{ __('translate.Please_provide_any_details') }} </label>
                                <textarea type="text" v-model="post.description" class="form-control" name="description" id="description"
                                          placeholder="{{ __('translate.Please_provide_any_details') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary" :disabled="SubmitProcessing">
                        <span v-if="SubmitProcessing" class="spinner-border spinner-border-sm" role="status"
                              aria-hidden="true"></span> <i class="i-Yes me-2 font-weight-bold"></i>
                            {{ __('translate.submit') }}
                        </button>
                    </div>
                </div>
            </form>

            <!-- end::form -->
        </div>

    </div>
@endsection
@section('page-js')
    <script src="{{ asset('assets/js/nprogress.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/vuejs-datepicker/vuejs-datepicker.min.js') }}"></script>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/de40kwmk0id148lbzq3xn8j01gfkanu1lwx3at8zn5l432md/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea#description',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

    <script type="text/javascript">
        $(function() {
            "use strict";

            $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    return false;
                }
            });

        });
    </script>

    <script>
        Vue.component('v-select', VueSelect.VueSelect);

        var app = new Vue({
            el: '#section_create_post',
            data: {
                SubmitProcessing: false,
                data: new FormData(),
                preview: "",
                errors: [],
                description: "",
                post: {
                    title: "",
                    status: "",
                    category: "",
                    image: "",
                },
            },

            methods: {
                onFileSelected(e) {
                    let file = e.target.files[0];
                    this.post.image = file;
                    var input = e.target;
                    if (input.files) {
                        var reader = new FileReader();
                        // console.log(reader)
                        reader.onload = (e) => {
                            this.preview = e.target.result;
                        }
                        this.image=input.files[0];
                        reader.readAsDataURL(input.files[0]);
                    }
                },

                //------------------------------ Create new Post ------------------------------\\
                Create_Post() {
                    NProgress.start();
                    NProgress.set(0.1);
                    var self = this;
                    self.SubmitProcessing = true;

                    // append objet product
                    Object.entries(self.post).forEach(([key, value]) => {
                        self.data.append(key, value);
                    });

                    self.data.append("description", tinymce.get("description").getContent());

                    // Send Data with axios
                    axios
                        .post("/post/", self.data)
                        .then(response => {
                            // Complete the animation of theprogress bar.
                            NProgress.done();
                            self.SubmitProcessing = false;
                            window.location.href = '/post/posts';
                            toastr.success('{{ __('translate.Created_in_successfully') }}');
                            self.errors = {};
                        })
                        .catch(error => {
                            // Complete the animation of theprogress bar.
                            NProgress.done();
                            self.SubmitProcessing = false;

                            if (error.response.status == 422) {
                                self.errors = error.response.data.errors;
                                toastr.error('{{ __('translate.There_was_something_wronge') }}');
                            }
                        });
                }
            },
        });
    </script>
@endsection

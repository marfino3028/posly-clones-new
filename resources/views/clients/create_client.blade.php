@extends('layouts.master')
@section('main-content')
@section('page-css')
@endsection

<div class="breadcrumb">
    <h1>{{ __('translate.AddCustomer') }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_create_client">
    <div class="col-lg-12 mb-3">
        <div class="card">

            <form @submit.prevent="Create_Client()">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="username">{{ __('translate.FullName') }} <span
                                    class="field_required">*</span></label>
                            <input type="text" v-model="client.username" class="form-control"
                                name="username" id="username" placeholder="{{ __('translate.FullName') }}">
                            <span class="error" v-if="errors && errors.username">
                                @{{ errors.username[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Phone">{{ __('translate.Phone') }}</label>
                            <input type="text" v-model="client.phone" class="form-control" id="Phone"
                                placeholder="{{ __('translate.Enter_Phone') }}">
                            <span class="error" v-if="errors && errors.phone">
                                @{{ errors.phone[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">{{ __('translate.Email') }}</label>
                            <input type="text" v-model="client.email" class="form-control" id="email"
                                   id="email" placeholder="{{ __('translate.Enter_email_address') }}">
                            <span class="error" v-if="errors && errors.email">
                                @{{ errors.email[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-3">
                            <label>{{ __('translate.Province') }} <span class="field_required">*</span></label>
                            <v-select @input="getCity" placeholder="{{ __('translate.Enter_Province') }}" v-model="client.province"
                                      :reduce="(option) => option.value"
                                      :options="provinces.map(provinces => ({ label: provinces.name, value: provinces.id }))">
                            </v-select>

                            <span class="error" v-if="errors && errors.province">
                                @{{ errors.province[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-3">
                            <label>{{ __('translate.City') }} <span class="field_required">*</span></label>
                            <v-select @input="getDistrict" placeholder="{{ __('translate.Enter_City') }}" v-model="client.city"
                                      :reduce="(option) => option.value"
                                      :options="cities.map(cities => ({ label: cities.name, value: cities.id }))">
                            </v-select>

                            <span class="error" v-if="errors && errors.city">
                                @{{ errors.city[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-3">
                            <label>{{ __('translate.District') }} <span class="field_required">*</span></label>
                            <v-select @input="getSubDistrict" placeholder="{{ __('translate.Enter_District') }}" v-model="client.district"
                                      :reduce="(option) => option.value"
                                      :options="districts.map(districts => ({ label: districts.name, value: districts.id }))">
                            </v-select>

                            <span class="error" v-if="errors && errors.district">
                                @{{ errors.district[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-3">
                            <label>{{ __('translate.SubDistrict') }} <span class="field_required">*</span></label>
                            <v-select placeholder="{{ __('translate.Enter_SubDistrict') }}" v-model="client.subdistrict"
                                      :reduce="(option) => option.value"
                                      :options="subdistricts.map(subdistricts => ({ label: subdistricts.name, value: subdistricts.id }))">
                            </v-select>

                            <span class="error" v-if="errors && errors.subdistrict">
                                @{{ errors.subdistrict[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="photo">{{ __('translate.Image') }}</label>
                            <input name="photo" @change="changePhoto" type="file" class="form-control"
                                id="photo">
                            <span class="error" v-if="errors && errors.photo">
                                @{{ errors.photo[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="postalCode">{{ __('translate.postalCode') }} <span
                                    class="field_required">*</span></label>
                            <input type="text" v-model="client.postal_code" class="form-control"
                                name="postalCode" id="postalCode" placeholder="{{ __('translate.PostalCode') }}">
                            <span class="error" v-if="errors && errors.postalCode">
                                @{{ errors.postalCode[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="address">{{ __('translate.Address') }}</label>
                            <textarea v-model="client.address" class="form-control" name="address"
                                id="address"
                                placeholder="{{ __('translate.Address') }}"></textarea>
                        </div>
                    </div>
                    <div class="separator-breadcrumb border-top mt-4"></div>
                    {{--<div class="row">
                        <div class="form-group col-md-4">
                            <label for="officeName">{{ __('translate.officeName') }}</label>
                            <input type="text" v-model="client.office_name" class="form-control"
                                name="officeName" id="officeName" placeholder="{{ __('translate.officeName') }}">
                            <span class="error" v-if="errors && errors.officeName">
                                @{{ errors.officeName[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="officePhone">{{ __('translate.officePhone') }}</label>
                            <input type="text" v-model="client.office_phone" class="form-control"
                                name="officePhone" id="officePhone" placeholder="{{ __('translate.officePhone') }}">
                            <span class="error" v-if="errors && errors.officePhone">
                                @{{ errors.officePhone[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="officePostalCode">{{ __('translate.officePostalCode') }}</label>
                            <input type="text" v-model="client.office_postal_code" class="form-control"
                                name="officePostalCode" id="officePostalCode" placeholder="{{ __('translate.officePostalCode') }}">
                            <span class="error" v-if="errors && errors.officePostalCode">
                                @{{ errors.officePostalCode[0] }}
                            </span>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="officeAddress">{{ __('translate.officeAddress') }}</label>
                            <textarea v-model="client.office_address" class="form-control" name="officeAddress"
                                id="officeAddress"
                                placeholder="{{ __('translate.officeAddress') }}"></textarea>
                        </div>
                    </div>--}}

                    <div class="row mt-3">

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary" :disabled="SubmitProcessing">
                                <span v-if="SubmitProcessing" class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span> <i class="i-Yes me-2 font-weight-bold"></i>
                                {{ __('translate.Submit') }}
                            </button>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('page-js')

<script>
    Vue.component('v-select', VueSelect.VueSelect)

    var app = new Vue({
        el: '#section_create_client',
        data: {
            editmode: false,
            SubmitProcessing:false,
            errors:[],
            data: new FormData(),
            provinces: @json($provinces),
            cities: [],
            districts: [],
            subdistricts: [],
            client: {
                username: "",
                code: "",
                photo:"",
                status:1,
                email: "",
                provinces: "",
                city: "",
                district: "",
                subdistrict: "",
                phone: "",
                address: "",
                postalCode: "",
                /*officeName: "",
                officeAddress: "",
                officePhone: "",
                officePostalCode: "",*/
            },
        },

        methods: {

            getCity(value) {
                this.cities = [];
                console.log("Get city data");
                axios
                    .get("/region/cities/" + value)
                    .then(({ data }) => (this.cities = data.cities));
                console.log(this.cities);
            },

            getDistrict(value) {
                this.districts = [];
                console.log("Get district data");
                axios
                    .get("/region/districts/" + value)
                    .then(({ data }) => (this.districts = data.districts));
                console.log(this.districts);
            },

            getSubDistrict(value) {
                this.subdistricts = [];
                console.log("Get sub district data");
                axios
                    .get("/region/subdistricts/" + value)
                    .then(({ data }) => (this.subdistricts = data.villages));
                console.log(this.villages);
            },

            changePhoto(e){
                let file = e.target.files[0];
                this.client.photo = file;
            },


             //------------------------ Create_Client ---------------------------\\
             Create_Client() {
                var self = this;
                self.SubmitProcessing = true;
                self.data.append("username", self.client.username);
                self.data.append("status", self.client.status);
                self.data.append("email", self.client.email);
                self.data.append("province", self.client.province);
                self.data.append("city", self.client.city);
                self.data.append("district", self.client.district);
                self.data.append("subdistrict", self.client.subdistrict);
                self.data.append("phone", self.client.phone);
                self.data.append("address", self.client.address);
                self.data.append("photo", self.client.photo);
                self.data.append("postalCode", self.client.postal_code);
                /*self.data.append("officeName", self.client.office_name);
                self.data.append("officeAddress", self.client.office_address);
                self.data.append("officePostalCode", self.client.office_postal_code);
                self.data.append("officePhone", self.client.office_phone);*/

                axios
                    .post("/people/clients", self.data)
                    .then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/people/clients';
                        toastr.success('{{ __('translate.Created_in_successfully') }}');
                        self.errors = {};
                })
                .catch(error => {
                    self.SubmitProcessing = false;
                    if (error.response.status == 422) {
                        self.errors = error.response.data.errors;
                    }
                    toastr.error('{{ __('translate.There_was_something_wronge') }}');
                });
            },


        },
        //-----------------------------Autoload function-------------------
        created() {
        }
    })
</script>

@endsection

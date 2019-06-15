
<template>

    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new company</div>
            <div class="panel-body">

<!--                <p v-if="errors.length">-->
<!--                    <b>Please correct the following error(s):</b>-->
<!--                    <ul>-->
<!--                        <li class="text-danger" v-for="error in errors">{{ error }}</li>-->
<!--                    </ul>-->
<!--                </p>-->

                <form v-on:submit.prevent="saveForm()" id="comForm" @submit="checkForm">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company name</label>
                            <input type="text" name="name" v-model="company.name" class="form-control">
                            <p class="text-danger" v-if="errors.name">{{errors.name[0]}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company address</label>
                            <input type="text" name="address" v-model="company.address" class="form-control">
                            <p class="text-danger" v-if="errors.address">{{errors.address[0]}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company website</label>
                            <input type="text" name="website" v-model="company.website" class="form-control">
                            <p class="text-danger" v-if="errors.website">{{errors.website[0]}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company email</label>
                            <input type="text" name="email" v-model="company.email" class="form-control">
                            <p class="text-danger" v-if="errors.email">{{errors.email[0]}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company About</label>
                            <textarea type="text" name="about" v-model="company.about" class="form-control"></textarea>
                            <p class="text-danger" v-if="errors.about">{{errors.about[0]}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group" id="country">
                            <label class="control-label">Select Country</label>
                            <select name="country" v-model="company.country" class="form-control">
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                            </select>
                            <p class="text-danger" v-if="errors.country">{{errors.country[0]}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group" >
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"  type="checkbox" v-model="company.check_box_1" value="1">
                                <label class="form-check-label">Box 1</label>

                                <input class="form-check-input" type="checkbox"  v-model="company.check_box_1" value="2">
                                <label class="form-check-label">Box 2</label>

                                <input class="form-check-input" type="checkbox"  v-model="company.check_box_1" value="3">
                                <label class="form-check-label">Box 2</label>

                                <input class="form-check-input" type="checkbox" v-model="company.check_box_1" value="4">
                                <label class="form-check-label">Box 4</label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group" >
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" v-model="company.status" value="active" checked>
                                <label class="form-check-label">Active</label>

                                <input class="form-check-input" type="radio" name="status" v-model="company.status"  value="inactive">
                                <label class="form-check-label">Inactive</label>
                            </div>
                            <p class="text-danger" v-if="errors.status">{{errors.status[0]}}</p>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data: function () {
            return {
                errors: [],
                company: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
                    about: '',
                    country: '',
                    check_box_1: [],
                    status: '',
                }
            }
        },
        methods: {
            // checkForm: function (e) {
            //     if (this.name && this.address && this.website && this.email && this.about && this.country && this.status) {
            //         return true;
            //     }
            //
            //     this.errors = [];
            //
            //     if (!this.company.name) {
            //         this.errors.push('Name required.');
            //     }
            //     if (!this.company.address) {
            //         this.errors.push('Address required.');
            //     }
            //     if (!this.company.website) {
            //         this.errors.push('Website required.');
            //     }
            //     if (!this.company.email) {
            //         this.errors.push('Email required.');
            //     } else if (!this.validEmail(this.company.email)) {
            //         this.errors.push('Valid email required.');
            //     }
            //     if (!this.company.about) {
            //         this.errors.push('About required.');
            //     }
            //     if (!this.company.country) {
            //         this.errors.push('Country required.');
            //     }
            //     if (!this.company.status) {
            //         this.errors.push('Status required.');
            //     }
            //     if (!this.errors.length) {
            //         return true;
            //     }
            //     e.preventDefault();
            // },
            // validEmail: function (email) {
            //     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            //     return re.test(email);
            // },


            saveForm() {
                var app = this;
                var newCompany = app.company;
                axios.post('/api/v1/companies', newCompany)
                    .then(function (resp) {
                        if (resp.data.status == 5000){
                            app.errors = resp.data.error;
                        }else {
                            app.$router.push({path: '/'});
                        }
                    })
                    .catch(function (resp) {
                        alert("Could not create your company");
                    });
            }
        }
    }

</script>


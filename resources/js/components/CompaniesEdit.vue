
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit company</div>
            <div class="panel-body">
                <form v-on:submit.prevent="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company name</label>
                            <input type="text" v-model="company.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company address</label>
                            <input type="text" v-model="company.address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company website</label>
                            <input type="text" v-model="company.website" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company email</label>
                            <input type="text" v-model="company.email" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company About</label>
                            <textarea type="text" v-model="company.about" class="form-control"></textarea>
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group" >
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"  type="checkbox" v-model="company.check_box_1" value="1">
                                <label class="form-check-label">Box 1</label>

                                <input class="form-check-input" type="checkbox" v-model="company.check_box_1" value="2">
                                <label class="form-check-label">Box 2</label>

                                <input class="form-check-input" type="checkbox" v-model="company.check_box_1" value="3">
                                <label class="form-check-label">Box 2</label>

                                <input class="form-check-input" type="checkbox" v-model="company.check_box_1" value="4">
                                <label class="form-check-label">Box 4</label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group" >
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" v-model="company.status" value="active">
                                <label class="form-check-label">Active</label>

                                <input class="form-check-input" type="radio" name="status" v-model="company.status"  value="inactive">
                                <label class="form-check-label">Inactive</label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.companyId = id;
            axios.get('/api/v1/companies/' + id)
                .then(function (resp) {
                    app.company = resp.data;
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
        data: function () {
            return {
                companyId: null,
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
            saveForm() {
                var app = this;
                var newCompany = app.company;
                console.log(newCompany);
                axios.patch('/api/v1/companies/' + app.companyId, newCompany)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>

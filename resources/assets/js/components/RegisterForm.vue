<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <FormulateForm
                    name="login"
                    @submit="onClickRegister"
                    v-model="formData"
                    class="register-form"
            >
                <h2 class="form-title">Sign Up</h2>
                <hr/>
                <div class="col-sm-offset-1">
                    <Division required/>
                    <District :division="formData.division" required/>
                    <Upazila :district="formData.district" required/>
                    <Union :upazila="formData.upazila" required/>
                    <FormulateInput
                            name="first_name"
                            label="Name"
                            placeholder="Name"
                            validation-name="Name"
                            validation="required"
                    />
                    <FormulateInput
                            name="email"
                            label="Email"
                            placeholder="Email"
                            validation="email"
                    />
                    
                    <FormulateInput
                            name="username"
                            label="Username / Mobile Number"
                            placeholder="Username / Mobile Number"
                            validation="required"
                    />
                    <div class="double-wide">
                        <FormulateInput
                                name="password"
                                type="password"
                                label="Password"
                                placeholder="password"
                                validation="required"
                        />
                        <FormulateInput
                                name="password_confirm"
                                type="password"
                                label="Confirm password"
                                placeholder="Confirm password"
                                validation="required|confirm"
                                validation-name="Confirmation"
                        />
                    </div>
                    <FormulateInput
                            name="is_term_accept"
                            type="checkbox"
                            label="I accept terms and conditions"
                            validation-name="Terms and conditions"
                            validation="required"
                    />
                    <FormulateErrors/>
                    <uiv-btn type="primary" native-type="submit">Sign Up</uiv-btn>
                    <uiv-btn type="default" native-type="button" @click="reset">Reset</uiv-btn>
                </div>
            </FormulateForm>
        </div>
    </div>
</template>

<script>
    import Division from "./feature/Division";
    import District from "./feature/District";
    import Upazila from "./feature/Upazila";
    import Union from "./feature/Union";
    export default {
        components: {
            Division,
            District,
            Upazila,
            Union,
        },
        data() {
            return {
                isLoading: false,
                formData: {},
            }
        },
        methods: {
            onClickRegister() {
                this.isLoading = true;
                axios
                    .post('register', {
                        ...this.formData,
                        password_confirmation: this.formData.password_confirm,
                    })
                    .then(({data}) => {
                        if (data.status) {
                            // window.location = data.redirect || '/admin/dashboard';
                            flash(data.message, 'success', true);
                        } else {
                            flash(data.email, 'danger', true);
                        }
                    })
                    .catch(error => {
                        const message = Object.values(error.response.data.errors).map(m => m[0]);
                        flash(message, 'danger', true);
                    })
                    .finally(() => this.isLoading = false)
            },
            reset() {
                this.$formulate.reset('login')
            },
        },
    }
</script>

<style>
    .register-form {
        background-color: #ffffff;
        padding: 1em 2em 1em 1em;
        border: 1px solid #a8a8a8;
        border-radius: .5em;
        box-sizing: border-box;
    }

    @media (min-width: 420px) {
        .double-wide {
            display: flex;
        }

        .double-wide .formulate-input {
            flex-grow: 1;
            width: calc(50% - .5em);
        }

        .double-wide .formulate-input:first-child {
            margin-right: .5em;
        }

        .double-wide .formulate-input:last-child {
            margin-left: .5em;
        }
    }
</style>
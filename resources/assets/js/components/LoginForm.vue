<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <FormulateForm
                    name="login"
                    @submit="onClickLogin"
                    v-model="formData"
                    class="login-form"
            >
                <h2 class="form-title">Login</h2>
                <hr/>
                <div class="col-sm-offset-1">
                    <FormulateInput
                            name="username"
                            label="Username"
                            validation="required"
                    />
                    <FormulateInput
                            type="password"
                            name="password"
                            label="Password"
                            validation="required"
                    />
                    <FormulateInput
                            name="remember"
                            type="checkbox"
                            label="Remember me"
                    />
                    <FormulateErrors/>
                    <div class="actions">
                        <uiv-btn type="primary" native-type="submit">Login</uiv-btn>
                        <uiv-btn type="link" href="/password/reset">Forgot Your Password?</uiv-btn>
                    </div>
                </div>
            </FormulateForm>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                formData: {
                    username: '',
                    password: '',
                },
            }
        },
        beforeMount(){
            this.onLogout();
        },
        methods: {
            onClickLogin() {
                this.isLoading = true;
                axios
                    .post('/login', {
                        ...this.formData
                    })
                    .then(({data}) => {
                        if (data.status) {
                            if (window.localStorage) {
                                localStorage.setItem('api_token', data.token);
                            }
                            window.location = data.redirect || '/admin/dashboard';
                        } else {
                            flash(data.username, 'danger', true);
                        }
                    })
                    .catch(error => {
                        flash(error, 'danger', true);
                    })
                    .finally(() => this.isLoading = false)
            },
            onLogout() {
                // note: short circuit code here to remove the condition
                if (window.localStorage && localStorage.getItem('api_token')) {
                    localStorage.removeItem('api_token');
                    window.location = '/login';
                }
            }
        },
    }
</script>

<style>
    .actions {
        display: flex;
        margin-bottom: 1em;
    }

    .actions .btn {
        margin-right: 1em;
        margin-bottom: 0;
    }

    .login-form {
        background-color: #ffffff;
        padding: 1em 2em 1em 1em;
        border: 1px solid #a8a8a8;
        border-radius: .5em;
        max-width: 500px;
        box-sizing: border-box;
    }

    .form-title {
        margin-top: 0;
    }
</style>
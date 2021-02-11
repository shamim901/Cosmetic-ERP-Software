<template>
    <FormulateInput
            type="select2"
            name="division"
            label="Division"
            placeholder="Select..."
            :options="getOptions"
            :isLoading="isLoading"
            :multiple="multiple"
            :validation="validation"
    />
</template>

<script>
    export default {
        props: {
            required: {
                type: Boolean,
                value: false,
            },
            multiple: {
                type: Boolean,
                value: false,
            },
        },
        data() {
            return {
                isLoading: false,
                options: [],
                validation: this.required === true ? 'required' : null,
                ajaxUrl: '/api/v1/divisions',
            }
        },
        async created() {
            await this.getAjaxOptions();
        },
        methods: {
            getAjaxOptions(query = '') {
                if (!this.ajaxUrl) {
                    return null;
                }
                this.isLoading = true;
                axios
                    .get(`${this.ajaxUrl}?q=${escape(query)}`)
                    .then(({data}) => data)
                    .then(({data}) => {
                        const op = data.map(m => ({...m, name: m.name}));
                        this.options = op;
                        this.isLoading = false;
                    })
                    .catch(error => {
                        flash(error, 'danger', true);
                        this.isLoading = false;
                    })
                ;
            },
        },
        computed: {
            getOptions() {
                return this.options || [];
            }
        }
    }
</script>
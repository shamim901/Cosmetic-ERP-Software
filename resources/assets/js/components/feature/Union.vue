<template>
    <div>
        
    
    <FormulateInput
            type="select2"
            name="union"
            label="Union"
            placeholder="Select..."
            :options="getOptions"
            :multiple="multiple"
            :validation="validation"

    />
    <p></p>
    </div>
</template>

<script>
    import get from 'lodash/get';

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
            upazila: {
                type: Object,
                value: {id: 0},
            },
        },
        data() {
            return {
                options: [],
                validation: this.required === true ? 'required' : null,
            }
        },
        watch: {
            upazila: function(){
                
                this.isLoading = true;
                axios
                    .get(`${this.getAjaxUrl}`)
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
            },
            getAjaxUrl() {
                return '/api/v1/upazilas/'+this.upazila.id+'/unions';
            },
        }
    }
</script>
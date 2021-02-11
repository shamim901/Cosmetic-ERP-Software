<template>
    <Multiselect
            v-model="context.model"
            v-bind="context.attributes"
            label="name"
            track-by="id"
            :placeholder="placeholder"
            :options="getOptions"
            :loading="isLoading"
            :allow-empty="true"
            :internal-search="allowInternalSearch"
            :show-no-results="false"
            :hide-selected="true"
            @search-change="searchChanges"
            @blur="context.blurHandler"
    />
</template>
<script>
    import Multiselect from 'vue-multiselect';
    import get from 'lodash/get';

    export default {
        components: {Multiselect},
        props: {
            context: {
                type: Object,
                required: true
            },
        },
        data() {
            const {
                multiple = false,
                searchable = true,
                placeholder = 'Select...',
                getAjaxOptions = false,
            } = this.context.attributes;
            return {
                multiple,
                searchable,
                placeholder,
                getAjaxOptions,
            };
        },
        computed: {
            searchChanges($event) {
                if (typeof this.getAjaxOptions === 'function') {
                    return this.getAjaxOptions.bind(this);
                }
                return () => {};
            },
            getOptions() {
                return this.context.options || [];
            },
            isLoading() {
                return Boolean(get(this.context, 'attributes.isLoading', false));
            },
            allowInternalSearch() {
                if (typeof this.getAjaxOptions === 'function') {
                    return false;
                }
                return true;
            }
        }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
    .multiselect__single {
        padding-left: 5px;
        margin-bottom: 0px;
        line-height: 30px;
    }

    .multiselect__tags {
        padding: 4px 40px 0 8px;
        border: 1px solid #ccc;
    }
</style>
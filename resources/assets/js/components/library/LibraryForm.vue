<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<h1 class="text-center">অনলাইন মসজিদ পাঠাগার ডাটাবেইজ সফটওয়্যার </h1>
                <FormulateForm
                        v-model="formData"
                        name="location"
                        class="library-form"
                        @submit="handle"
                >
	                <div class="row">
	                	<div class="col-md-4">
	                		<Division required/>
	                	</div>
	                	<div class="col-md-4">
	                		<District :division="formData.division"/>
	                	</div>
	                	<div class="col-md-4">
	                		<Upazila :district="formData.district"/>
	                	</div>
	                	<div class="col-md-4">
	                		<Union :upazila="formData.upazila"/>
	                	</div>

	                	<div class="col-md-4">
	                		<FormulateInput
	                            name="village"
	                            label="গ্রামের নাম"
	                            placeholder="গ্রামের নাম"
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-4">
	                		<FormulateInput
	                            name="mosque_name"
	                            label="মসজিদের নাম "
	                            placeholder="মসজিদের নাম "
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-4">
	                		<FormulateInput
	                            name="establish_year"
	                            label="পাঠাগার প্রতিষ্ঠার সন"
	                            placeholder="পাঠাগার প্রতিষ্ঠার সন"
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="total_books_by_ifa"
	                            label="ইফা প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য "
	                            placeholder="ইফা প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য "
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="total_books_by_other"
	                            label="বাইরের প্রকাশনার প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য"
	                            placeholder="বাইরের প্রকাশনার প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য"
	                            validation="required"
	                    	/>
	                	</div>
	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="total_books"
	                            label="প্রাপ্ত পুস্তকের সংখ্যা"
	                            placeholder="প্রাপ্ত পুস্তকের সংখ্যা"
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="total_almari"
	                            label="পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারীর সংখ্যা"
	                            placeholder="পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারীর সংখ্যা"
	                            validation="required"
	                    	/>
	                	</div>
	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="almari_receive_date"
	                            label="পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারীর  প্রদানের তারিখ"
	                            placeholder="পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারীর প্রদানের তারিখ"
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="last_visit_date"
	                            label="সর্বশেষ পরিদর্শন এর তারিখ "
	                            placeholder="সর্বশেষ পরিদর্শন এর তারিখ "
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="visitor_name"
	                            label="পরিদর্শনকারীর নাম"
	                            placeholder="পরিদর্শনকারীর নাম"
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="visitor_designation"
	                            label="পরিদর্শনকারীর পদবি "
	                            placeholder="পরিদর্শনকারীর পদবি "
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="visitor_address"
	                            label="পরিদর্শনকারীর ঠিকানা"
	                            placeholder="পরিদর্শনকারীর ঠিকানা"
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="visitor_comment"
	                            label="পরিদর্শনকারীর মন্তব্য"
	                            placeholder="পরিদর্শনকারীর মন্তব্য"
	                            validation="required"
	                    	/>
	                	</div>

	                	<div class="col-md-6">
	                		<FormulateInput
	                            name="have_signboard"
	                            label="সাইনবোর্ড আছে /নাই"
	                            placeholder="সাইনবোর্ড আছে /নাই"
	                            validation="required"
	                    	/>
	                	</div>
	                	
	                </div>
                   
                    <FormulateInput
                            type="submit"
                    />
                    <FormulateInput
                            type="button"
                            label="Reset"
                            data-ghost
                            @click="reset"
                    />
                </FormulateForm>
            </div>

        </div>
        <div class="col-md-6"><code class="code code--block">{{ formData }}</code></div>
    </div>
</template>
<script>
    import Division from "../feature/Division";
    import District from "../feature/District";
    import Upazila from "../feature/Upazila";
    import Union from "../feature/Union";

    export default {
        components: {
            Division,
            District,
            Upazila,
            Union,
        },
        data() {
            return {
                formData: {
                    name: 'Jenny Taylor', //edit mode
                }
            }
        },
        methods: {
            reset() {
                this.$formulate.reset('location')
            },
            
            handle() {
                alert('All validation complete, form submitted.')
            }
        }
    }
</script>

<style scoped>
	.library-form {
        background-color: #ffffff;
        padding: 30px;
        border: 1px solid #a8a8a8;
        border-radius: 0;
        box-sizing: border-box;
    }

    .formulate-input .formulate-input-label {
	    margin-top: 15px;
	}


    @media (min-width: 650px) {
        .triple {
            display: flex;
        }

        .triple .formulate-input {
            margin-bottom: .25em;
            margin-right: 1em;
            flex-grow: 1;
        }

        .triple .formulate-input[data-classification="select"] {
            flex: 0 0 5em;
        }

        .triple .formulate-input:last-child {
            margin-right: 0;
        }
    }

    @media (min-width: 720px) {
        .triple {
            display: block;
        }

        .triple .formulate-input {
            margin-bottom: 1.5em;
            margin-right: 0;
        }
    }

    @media (min-width: 850px) {
        .triple {
            display: flex;
        }

        .triple .formulate-input {
            margin-bottom: .25em;
            margin-right: 1em;
        }

        .triple .formulate-input:last-child {
            margin-right: 0;
        }
    }

</style>

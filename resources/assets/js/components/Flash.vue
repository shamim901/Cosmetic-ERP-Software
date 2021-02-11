<template>
    <div v-show="show" :class="typeClass">
        <b>Please correct the following error(s):</b>
        <ul v-if="isArrayType">
          <li v-for="error in body">{{ error }}</li>
        </ul>
        <div v-if="!isArrayType" :class="typeClass" v-html="body">{body}</div>
    </div>
</template>

<script>
export default {
	props: ["message", "type", "dontHide"],

	data() {
		return {
			body: "",
			typeClass: "",
			isArrayType: false,
			show: false
		};
	},

	created() {
		const context = this;

		if (this.message && this.type) {
			this.flash(this.message, this.type, this.dontHide);
		}

		window.events.$on("flash", function(message, type, dontHide) {
			context.flash(message, type, dontHide);
		});
	},

	methods: {
		flash(message, type, dontHide = false) {

			if (!type) {
				type = "info";
			}

			this.body = message;
			this.isArrayType = Array.isArray(message);
			this.typeClass = "alert alert-" + type;
			this.show = true;

			if (!dontHide) {
				this.hide();
			}
    	},

		hide() {
			setTimeout(() => {
				this.show = false;
			}, 3000);
		}
	}
};
</script>

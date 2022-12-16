<template>
  <h1>Welcome from welcome.vue</h1>

<v-calendar></v-calendar>
  <v-datepicker v-model="date" />
</template>

<script>
import { Calendar, DatePicker } from 'v-calendar';

export default {
	components: {
		'v-calendar': Calendar,
		'v-datepicker': DatePicker,
	},
	data() {
		return {
		date: new Date(),
		};
	},
}
</script>

<style>

</style>
<template>
<div>
  <v-icon :color="color" @click="show = true">{{ icon }}</v-icon>
  <v-layout row justify-center>
    <v-dialog v-model="show" max-width="500">
      <v-card>
        <v-card-title class="headline text-md-center">{{ message }}</v-card-title>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat @click="show = false">{{ $t('Cancel') }}</v-btn>
          <v-btn color="red darken-1" flat @click="confirm()">{{ $t('Confirm') }}</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</div>
</template>

<script>
export default {
  props: {
    icon: String,
    message: String,
    color: String
  },
  data() {
    return {
      show: false
    };
  },
  methods: {
    confirm() {
      this.$emit("confirm");
    }
  }
};
</script>

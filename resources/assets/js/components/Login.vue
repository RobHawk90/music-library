<template>
  <v-app id="login" dark>
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4 lg4>
            <v-card light class="elevation-1 pa-3">
              <v-card-text>
                <div class="layout column align-center">
                  <h1 class="flex my-4">Music Library</h1>
                </div>
                <v-text-field append-icon="person" name="email" label="Email" type="text" v-model="email"></v-text-field>
                <v-text-field append-icon="lock" name="password" :label="$t('Password')" id="password" type="password" v-model="password"></v-text-field>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn type="submit" dark block @click="login" :loading="loading">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    loading: false,
    email: "",
    password: ""
  }),
  methods: {
    login() {
      this.loading = true;
    }
  }
};
</script>
<style scoped>
#login {
  height: 50%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  content: "";
  z-index: 0;
}
</style>
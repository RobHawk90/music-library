<template>
<div>
  <h1>{{ $t('Users') }}</h1>
  <v-list two-line>
    <template v-for="user in users">
      <v-list-tile :key="user.id">
        <v-list-tile-content>
          <v-list-tile-title>{{ user.name }}</v-list-tile-title>
          <v-list-tile-sub-title>{{ user.email }}</v-list-tile-sub-title>
          <v-list-tile-sub-title>{{ $t(user.access) }}</v-list-tile-sub-title>
        </v-list-tile-content>
        <v-list-tile-action v-if="$user.access === 'Admin'">
          <v-icon @click="edit(user)">edit</v-icon>
          <confirm-button
            color="red"
            @confirm="remove(user)"
            :message="$t('Do you really want to remove the user') + ` '${user.name}'?`"
            icon="remove_circle"></confirm-button>
        </v-list-tile-action>
      </v-list-tile>
      <v-divider :key="user.id"></v-divider>
    </template>
  </v-list>
  <v-snackbar v-model="snackbar" :timeout="3000" :color="color">{{ message }}</v-snackbar>
</div>
</template>

<script>
import ConfirmButton from "../shared/ConfirmButton";
import UserResource from "../../resources/UserResource";

export default {
  components: {
    ConfirmButton
  },
  data() {
    return {
      users: [],
      resource: new UserResource(),
      message: "",
      snackbar: false,
      color: ""
    };
  },
  methods: {
    listAll() {
      this.resource.listAll().then(users => {
        this.users = users;
      });
    },
    edit(user) {
      this.$router.push({ name: "edit_user", params: { id: user.id } });
    },
    remove(user) {
      this.resource
        .remove(user.id)
        .then(message => {
          this.message = message;
          this.snackbar = true;
          this.color = "success";
          const index = this.users.indexOf(user);
          this.users.splice(index, 1);
        })
        .catch(({ response }) => {
          if (response.status === 403) {
            this.color = "red";
            this.snackbar = true;
            this.message = this.$t("You do not have access");
          }
        });
    }
  },
  created() {
    this.listAll();
  }
};
</script>

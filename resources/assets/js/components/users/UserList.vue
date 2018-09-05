<template>
    <div>
        <h1>{{ $t('Users') }}</h1>
        <v-list two-line>
            <template v-for="(user, index) in users">
                <v-list-tile :key="user.id">
                    <v-list-tile-content>
                        <v-list-tile-title>{{ user.name }}</v-list-tile-title>
                        <v-list-tile-sub-title>{{ user.email }}</v-list-tile-sub-title>
                        <v-list-tile-sub-title>{{ $t(user.access) }}</v-list-tile-sub-title>
                    </v-list-tile-content>
                    <v-list-tile-action>
                        <v-icon @click="edit(user)">edit</v-icon>
                        <confirm-button
                            color="red"
                            @confirm="remove(user)"
                            :message="$t('Do you really want to remove the user') + ` '${user.name}'?`"
                            icon="remove_circle"></confirm-button>
                    </v-list-tile-action>
                </v-list-tile>
                <v-divider></v-divider>
            </template>
        </v-list>
        <v-snackbar v-model="snackbar" :timeout="3000" color="success">{{ message }}</v-snackbar>
    </div>
</template>

<script>
    import ConfirmButton from '../ConfirmButton';
    import UserResource from '../../resources/UserResource';

    export default {
        components: {
            ConfirmButton,
        },
        data() {
            return {
                users: [],
                resource: new UserResource(),
                message: '',
                snackbar: false,
            };
        },
        methods: {
            listAll() {
                this.resource.listAll().then(users => {
                    this.users = users;
                });
            },
            edit(user) {
                this.$router.push({name: 'edit_user', params: {id: user.id}});
            },
            remove(user) {
                this.resource.remove(user.id).then(message => {
                    this.message = message;
                    this.snackbar = true;
                    const index = this.users.indexOf(user);
                    this.users.splice(index, 1);
                });
            },
        },
        created() {
            this.listAll();
        },
    }
</script>

<style lang="scss"></style>

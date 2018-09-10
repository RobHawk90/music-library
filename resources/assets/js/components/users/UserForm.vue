<template>
    <div>
        <h1>{{ title }}</h1>
        <v-form @submit.prevent="save()">
            <v-text-field
                v-model="user.name"
                :label="$t('Name')"
                :error-messages="errors.name"></v-text-field>
            <v-text-field
                type="email"
                v-model="user.email"
                :label="$t('Email')"
                :error-messages="errors.email"></v-text-field>
            <v-text-field
                type="password"
                v-model="user.password"
                :label="$t('Password')"
                :error-messages="errors.password"></v-text-field>
            <v-text-field
                type="password"
                v-model="user.password_confirmation"
                :label="$t('Password Confirmation')"
                :error-messages="errors.password"></v-text-field>
            <v-select
                v-model="user.access"
                :items="accessLevels"
                :label="$t('Access Level')"
                :error-messages="errors.access"></v-select>
            <v-btn type="submit">{{ $t('Save') }}</v-btn>
            <v-btn @click="newUser()">{{ $t('New') }}</v-btn>
        </v-form>
        <v-snackbar v-model="snackbar" :timeout="3000" color="success">{{ message }}</v-snackbar>
    </div>
</template>

<script>
    import UserResource from '../../resources/UserResource';

    export default {
        created() {
            const id = this.$route.params.id;

            if(id)
                this.resource.findById(id).then(user => {
                    this.user = user;
                    this.title = `${this.$t('Edit User')} "${user.name}"`;
                });
        },
        data() {
            return {
                title: this.$t('New User'),
                user: {},
                accessLevels: [
                    {value: 'Admin', text: this.$t('Admin')},
                    {value: 'User', text: this.$t('User')}
                ],
                message: '',
                snackbar: false,
                errors: {},
                resource: new UserResource(),
            };
        },
        methods: {
            save() {
                this.resource.save(this.user).then(data => {
                    this.newUser();
                    this.showSnack(data.msg);
                }).catch(({response}) => {
                    if(response.status === 422)
                        this.errors = response.data.errors;
                });
            },
            showSnack(message) {
                this.message = message;
                this.snackbar = true;
            },
            newUser() {
                this.$router.push({name: 'new_user'});
                this.user = {};
                this.title = this.$t('New User');
            },
        },
    }
</script>

<style lang="scss"></style>

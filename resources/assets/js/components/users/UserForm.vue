<template>
    <div>
        <h1>{{ $t('New User') }}</h1>
        <form @submit.prevent="save()">
            <v-text-field v-model="user.name" :label="$t('Name')"></v-text-field>
            <v-text-field v-model="user.email" :label="$t('Email')"></v-text-field>
            <v-text-field type="password" v-model="user.password" :label="$t('Password')"></v-text-field>
            <v-text-field type="password" v-model="user.password_confirmation" :label="$t('Password Confirmation')"></v-text-field>
            <v-combobox v-model="user.access" :items="accessLevels" :label="$t('Access Level')"></v-combobox>
            <v-btn type="submit">{{ $t('Save') }}</v-btn>
        </form>
        <v-snackbar v-model="snackbar" :timeout="3000" color="success">{{ message }}</v-snackbar>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                accessLevels: [
                    {value: 'Admin', text: this.$t('Admin')},
                    {value: 'User', text: this.$t('User')}
                ],
                message: 'teste',
                snackbar: false,
            };
        },
        methods: {
            save() {
                const user = {...this.user};
                user.access = user.access['value'];
                axios.post('/api/users', user).then(res => {
                    this.user = {};
                    this.showSnack(`The user ${res.data.name} was created`);
                });
            },
            showSnack(message) {
                this.message = message;
                this.snackbar = true;
            }
        },
    }
</script>

<style lang="scss"></style>

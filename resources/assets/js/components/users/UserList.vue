<template>
    <div>
        <h1>{{ $t('Users') }}</h1>
        <v-list two-line>
            <template v-for="(user, index) in users">
                <v-list-tile :key="user.id">
                    <v-list-tile-content>
                        <v-list-tile-title>{{ user.name }}</v-list-tile-title>
                        <v-list-tile-sub-title>{{ user.email }}</v-list-tile-sub-title>
                    </v-list-tile-content>
                    <v-list-tile-action>
                        <v-icon @click="edit(user)">edit</v-icon>
                        <v-icon @click="remove(user)">remove_circle</v-icon>
                    </v-list-tile-action>
                </v-list-tile>
                <v-divider></v-divider>
            </template>
        </v-list>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
            };
        },
        methods: {
            listAll() {
                axios.get('/api/users').then(res => {
                    this.users = res.data;
                });
            },
            edit(user) {
                console.log(`Edit ${user.name}`);
            },
            remove(user) {
                console.log(`Remove ${user.name}`);
            },
        },
        created() {
            this.listAll();
        },
    }
</script>

<style lang="scss"></style>

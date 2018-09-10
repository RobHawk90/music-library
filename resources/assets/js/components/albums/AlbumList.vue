<template>
    <div>
        <h1>{{ $t('Albums') }}</h1>
        <v-container fluid grid-list-md>
            <v-layout row>
                <v-flex xs12 sm12 md6 lg4 xl3 v-for="album in albums" :key="album.id">
                    <v-card>
                        <v-img :src="'/' + album.image" aspect-ratio="1.5" contain></v-img>
                        <v-card-title class="justify-center">
                            <div class="text-md-center text-truncate">
                                <div class="title">{{ album.name + ` (${album.year})` }}</div>
                                <div class="body-2">{{ album.artist.name }}</div>
                            </div>
                        </v-card-title>
                        <v-card-actions v-if="user.access">
                            <v-icon @click="edit(album)">edit</v-icon>
                            <confirm-button
                                color="red"
                                :message="$t('Do you really want to remove the album') + ` '${album.name}'?`"
                                @confirm="remove(album)"
                                icon="remove_circle"
                                ></confirm-button>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        <v-snackbar v-model="snackbar" :timeout="3000" color="success">{{ message }}</v-snackbar>
    </div>
</template>

<script>
    import AlbumResource from '../../resources/AlbumResource';
    import ConfirmButton from '../ConfirmButton';

    export default {
        components: { ConfirmButton },
        created() {
            this.listAll();
            this.resource.user().then(user => this.user = user);
        },
        data() {
            return {
                albums: [],
                resource: new AlbumResource(),
                snackbar: false,
                message: '',
                user: {},
            };
        },
        methods: {
            listAll() {
                this.resource
                    .listAll()
                    .then(albums => this.albums = albums);
            },
            remove(album) {
                this.resource.remove(album.id)
                    .then(message => {
                        const index = this.albums.indexOf(album);
                        this.albums.splice(index, 1);
                        this.message = message;
                        this.snackbar = true;
                    })
            },
            edit(album) {
                this.$router.push({ name: 'edit_album', params: { id: album.id } });
            },
        }
    }
</script>

<style lang="scss"></style>

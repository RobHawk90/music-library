<template>
    <div>
        <h1>{{ $t('Artists') }}</h1>
        <v-container fluid grid-list-md>
            <v-layout row>
                <v-flex xs12 sm12 md6 lg4 xl3 v-for="artist in artists" :key="artist.id">
                    <v-card>
                        <v-img :src="'/' + artist.image" aspect-ratio="1.5" contain></v-img>
                        <v-card-title primary-title>
                            <div class="text-truncate">
                                <div class="headline">{{ artist.name }}</div>
                                <div>{{ artist.description }}</div>
                            </div>
                        </v-card-title>
                        <v-card-actions v-if="$user.access">
                            <v-icon @click="edit(artist)">edit</v-icon>
                            <confirm-button
                                color="red"
                                :message="$t('Do you really want to remove the artist') + ` '${artist.name}'`"
                                @confirm="remove(artist)"
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
    import ConfirmButton from '../ConfirmButton';
    import ArtistResource from '../../resources/ArtistResource';

    export default {
        components: { ConfirmButton },
        created() {
            this.listAll();
        },
        data() {
            return {
                resource: new ArtistResource(),
                artists: [],
                snackbar: false,
                message: '',
                user: {},
            };
        },
        methods: {
            listAll() {
                this.resource.listAll().then(artists => this.artists = artists);
            },
            edit(artist) {
                this.$router.push({name: 'edit_artist', params: {id: artist.id}});
            },
            remove(artist) {
                this.resource.remove(artist.id).then(message => {
                    const index = this.artists.indexOf(artist);
                    this.artists.splice(index, 1);
                    this.snackbar = true;
                    this.message = message;
                });
            }
        },
    }
</script>

<style lang="scss"></style>

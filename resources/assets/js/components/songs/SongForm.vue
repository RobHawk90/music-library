<template>
    <div>
        <v-btn @click="show = true">{{ $t('Add Song') }}</v-btn>
        <v-dialog :value="show">
            <v-card>
                <v-card-title class="headline" primary-title>
                    {{ title }}
                </v-card-title>
                <v-card-text>
                    <v-form @submit.prevent="save()">
                        <v-text-field
                            v-model="song.order"
                            :label="$t('Order')"
                            :error-messages="errors.order"></v-text-field>
                        <v-text-field
                            v-model="song.duration"
                            :label="$t('Duration')"
                            :error-messages="errors.duration"></v-text-field>
                        <v-text-field
                            v-model="song.name"
                            :label="$t('Name')"
                            :error-messages="errors.name"></v-text-field>
                        <v-text-field
                            v-model="song.composer"
                            :label="$t('Composer')"
                            :error-messages="errors.composer"></v-text-field>
                        <v-btn type="submit">{{ $t('Save') }}</v-btn>
                        <v-btn @click="newSong()">{{ $t('New') }}</v-btn>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    import SongResource from '../../resources/SongResource';

    export default {
        props: {
            album: Object,
            song: Object,
        },
        data() {
            return {
                title: this.$t('New Song'),
                errors: {},
                resource: new SongResource(),
                forceShow: false,
            };
        },
        computed: {
            show: {
                get() {
                    return this.song.id || this.forceShow;
                },
                set(show) {
                    this.forceShow = show;
                }
            }
        },
        methods: {
            save() {
                const song = this.song;
                song.album_id = this.album.id;

                this.resource
                    .save(song)
                    .then(data => {
                        this.$emit('save', data);
                        this.newSong();
                    })
                    .catch(({response}) => {
                        if(response.status === 422)
                            this.errors = response.data.errors;
                    });
            },
            newSong() {
                this.song = {};
                this.show = false;
            },
        },
    }
</script>

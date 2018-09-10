<template>
    <div>
        <h1>{{ title }}</h1>
        <v-layout column>
            <img :src="imageSrc">
            <v-form @submit.prevent="save()">
                <v-text-field
                    v-model="album.name"
                    :label="$t('Name')"
                    :error-messages="errors.name"></v-text-field>
                <v-text-field
                    v-model="album.year"
                    :label="$t('Year')"
                    :error-messages="errors.year"></v-text-field>
                <v-select
                    v-model="album.artist_id"
                    :items="artists"
                    :label="$t('Artist')"
                    :error-messages="errors.artist_id"></v-select>
                <file-input
                    @upload="fileUploaded"
                    v-model="album.image"
                    :error-messages="errors.image"></file-input>
                <v-btn type="submit">{{ $t('Save') }}</v-btn>
                <v-btn @click="newAlbum()">{{ $t('New') }}</v-btn>
            </v-form>
            <song-list v-if="album.id" :songs="album.musics" @remove="onRemoveSong" @edit="onEditSong">
                <song-form :song="song" :album="album" @save="onSaveSong"></song-form>
            </song-list>
            <v-snackbar v-model="snackbar" :timeout="3000" color="success">{{ message }}</v-snackbar>
        </v-layout>
    </div>
</template>

<script>
    import AlbumResource from '../../resources/AlbumResource';
    import FileInput from '../shared/FileInput';
    import SongForm from '../songs/SongForm';
    import SongList from '../songs/SongList';

    export default {
        components: { FileInput, SongForm, SongList },
        created() {
            const id = this.$route.params.id;

            if(id)
                this.resource.findById(id).then(album => {
                    this.album = album;
                    this.title = this.$t('Edit Album') + ` '${album.name}'`;
                    this.imageSrc = '/' + album.image;
                });

            this.listAllArtists();
        },
        data() {
            return {
                title: this.$t('New Album'),
                snackbar: false,
                message: '',
                album: {},
                artists: [],
                errors: {},
                resource: new AlbumResource(),
                imageSrc: `https://fakeimg.pl/350x200/?text=${this.$t('Select a file')}`,
                song: {},
            };
        },
        methods: {
            save() {
                this.resource
                    .save(this.album)
                    .then(data => {
                        this.message = data.msg;
                        this.snackbar = true;
                        this.newAlbum();
                    })
                    .catch(({response}) => {
                        if(response.status === 422)
                            this.errors = response.data.errors;
                    });
            },
            fileUploaded(image) {
                this.imageSrc = image.src;
                this.album.image = image.file;
            },
            listAllArtists() {
                this.resource
                    .listAllArtists()
                    .then(artists => {
                        this.artists = artists.map(artist => {
                            return { value: artist.id, text: artist.name };
                        })
                    });
            },
            newAlbum() {
                this.$router.push({ name: 'new_album' });
                this.album = {};
                this.errors = {};
                this.imageSrc = `https://fakeimg.pl/350x200/?text=${this.$t('Select a file')}`;
                this.title = this.$t('New Album');
            },
            onSaveSong(song) {
                const index = this.album.musics.findIndex(item => item.id === song.id);
                console.log(index === -1);
                const notInSongList = index === -1;
                if(notInSongList)
                    this.album.musics.push(song);
            },
            onEditSong(song) {
                this.song = song;
            },
            onRemoveSong(song) {
                const index = this.album.musics.indexOf(song);
                this.album.musics.splice(index, 1);
            }
        },
    }
</script>

<style lang="css">
    img {
        max-height: 200px;
        max-width: 350px;
    }
</style>

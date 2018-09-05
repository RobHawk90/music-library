<template>
    <div>
        <h1>{{ title }}</h1>
        <v-layout column>
            <img :src="imageSrc">
            <v-form @submit.prevent="save()">
                <v-text-field
                    v-model="artist.name"
                    :label="$t('Name')"
                    :error-messages="errors.name"></v-text-field>
                <v-text-field
                    v-model="artist.description"
                    :label="$t('Description')"
                    :error-messages="errors.description"></v-text-field>
                <v-text-field
                    v-model="artist.genre"
                    :label="$t('Genre')"
                    :error-messages="errors.genre"></v-text-field>
                <file-input
                    @upload="fileUploaded"
                    v-model="artist.image"
                    :error-messages="errors.image"></file-input>
                <v-btn type="submit">{{ $t('Save') }}</v-btn>
                <v-btn @click="newUser()">{{ $t('New') }}</v-btn>
            </v-form>
        </v-layout>
    </div>
</template>

<script>
    import FileInput from '../shared/FileInput';
    import ArtistResource from '../../resources/ArtistResource';

    export default {
        components: {
            FileInput,
        },
        created() {
        },
        data() {
            return {
                title: this.$t('New Artist'),
                artist: {},
                errors: {},
                imageSrc: `https://fakeimg.pl/350x200/?text=${this.$t('Select a file')}`,
                resource: new ArtistResource(),
            };
        },
        methods: {
            fileUploaded(image) {
                this.imageSrc = image.src;
                this.artist.image = image.file;
            },
            save() {
                const artist = this.artist;
                this.resource.save(artist).then(data => {
                    console.log(data);
                }).catch(({response}) => {
                    if(response.status === 422)
                        this.errors = response.data.errors;
                });
            },
        },
    }
</script>

<style lang="css">
    img {
        max-width: 350px;
        max-height: 200px;
    }
</style>

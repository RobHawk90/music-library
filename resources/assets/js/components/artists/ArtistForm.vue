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
      <v-btn @click="newArtist()">{{ $t('New') }}</v-btn>
    </v-form>
    <v-snackbar v-model="snackbar" :timeout="3000" color="success">{{ message }}</v-snackbar>
  </v-layout>
</div>
</template>

<script>
import FileInput from "../shared/FileInput";
import ArtistResource from "../../resources/ArtistResource";

export default {
  components: {
    FileInput
  },
  created() {
    const id = this.$route.params.id;
    if (id)
      this.resource.findById(id).then(artist => {
        this.title = this.$t("Edit Artist") + ` "${artist.name}"`;
        this.imageSrc = "/" + artist.image;
        this.artist = artist;
      });
  },
  data() {
    return {
      title: this.$t("New Artist"),
      artist: {},
      errors: {},
      imageSrc: `https://fakeimg.pl/350x200/?text=${this.$t("Select a file")}`,
      resource: new ArtistResource(),
      snackbar: false,
      message: ""
    };
  },
  methods: {
    fileUploaded(image) {
      this.imageSrc = image.src;
      this.artist.image = image.file;
    },
    save() {
      this.resource
        .save(this.artist)
        .then(data => {
          this.message = data.msg;
          this.snackbar = true;
          this.newArtist();
        })
        .catch(({ response }) => {
          if (response.status === 422) this.errors = response.data.errors;
        });
    },
    newArtist() {
      this.$router.push({ name: "new_artist" });
      this.artist = {};
      this.errors = {};
      this.imageSrc = `https://fakeimg.pl/350x200/?text=${this.$t(
        "Select a file"
      )}`;
      this.title = this.$t("New Artist");
    }
  }
};
</script>

<style scoped>
img {
  max-width: 350px;
  max-height: 200px;
}
</style>

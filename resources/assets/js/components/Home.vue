<template>
<div>
  <v-form @submit.prevent="search()">
    <v-text-field
      v-model="searchText"
      :label="$t('Search for bands, albums or songs')"
      append-icon="search"></v-text-field>
  </v-form>

  <v-container fluid grid-list-md v-if="searchData.artists">
    <hr>
    <h2>{{ $t('Artists') }}</h2>
    <v-layout row>
      <v-flex xs12 sm12 md6 lg4 xl3 v-for="artist in searchData.artists" :key="artist.id">
        <v-card>
          <v-img :src="'/' + artist.image" aspect-ratio="1.5" contain></v-img>
          <v-card-title primary-title>
            <div class="text-truncate">
              <div class="title">{{ artist.name }}</div>
              <div>{{ artist.description }}</div>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>

  <v-container fluid grid-list-md v-if="searchData.albums">
    <hr>
    <h2>{{ $t('Albums') }}</h2>
    <v-layout row>
      <v-flex xs12 sm12 md6 lg4 xl3 v-for="album in searchData.albums" :key="album.id">
        <v-card>
          <v-img :src="'/' + album.image" aspect-ratio="1.5" contain></v-img>
          <v-card-title class="justify-center">
            <div class="text-truncate">
              <div class="title">{{ album.name + ` (${album.year})` }}</div>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>

  <v-card v-if="searchData.songs">
    <v-card-title>
      <hr>
      <h2>{{ $t('Songs') }}</h2>
    </v-card-title>
    <v-card-text>
      <v-data-table :headers="songsHeaders" :items="searchData.songs" hide-actions>
        <template slot="items" slot-scope="props">
          <td>{{ props.item.order }}</td>
          <td>{{ props.item.duration }}</td>
          <td>{{ props.item.name }}</td>
          <td>{{ props.item.composer }}</td>
        </template>
      </v-data-table>
    </v-card-text>
  </v-card>
</div>
</template>

<script>
export default {
  data() {
    return {
      searchText: "",
      searchData: {},
      songsHeaders: [
        { text: "#", value: "order" },
        { text: this.$t("Duration"), value: "duration" },
        { text: this.$t("Name"), value: "name" },
        { text: this.$t("Composer"), value: "composer" }
      ]
    };
  },
  methods: {
    search() {
      const search = this.searchText;
      axios.post("/search", { search }).then(res => {
        this.searchData = res.data;
      });
    }
  }
};
</script>

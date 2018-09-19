<template>
<div>
  <v-card>
    <v-card-title>
      <slot></slot>
    </v-card-title>
    <v-card-text>
      <v-data-table :headers="headers" :items="songs" hide-actions>
        <template slot="items" slot-scope="props">
          <td>{{ props.item.order }}</td>
          <td>{{ props.item.duration }}</td>
          <td>{{ props.item.name }}</td>
          <td>{{ props.item.composer }}</td>
          <td><v-icon @click="edit(props.item)">edit</v-icon></td>
          <td>
            <confirm-button
              color="red"
              @confirm="remove(props.item)"
              :message="$t('Do you really want to remove the music') + ` '${props.item.name}'?`"
              icon="remove_circle"></confirm-button>
          </td>
        </template>
      </v-data-table>
    </v-card-text>
  </v-card>
</div>
</template>

<script>
import ConfirmButton from "../shared/ConfirmButton";
import SongResource from "../../resources/SongResource";

export default {
  components: { ConfirmButton },
  props: {
    songs: Array
  },
  data() {
    return {
      resource: new SongResource(),
      headers: [
        { text: "#", value: "order" },
        { text: this.$t("Duration"), value: "duration" },
        { text: this.$t("Name"), value: "name" },
        { text: this.$t("Composer"), value: "composer" },
        { text: "", value: "id" },
        { text: "", value: "id" }
      ]
    };
  },
  methods: {
    edit(item) {
      this.$emit("edit", item);
    },
    remove(item) {
      this.resource.remove(item.id).then(() => this.$emit("remove", item));
    }
  }
};
</script>

<template>
    <div>
        <v-text-field
            :label="label || $t('Select a file')"
            @click="openFileChooser()"
            v-model="fileName"
            :error-messages="errorMessages"
            append-icon="attach_file"></v-text-field>
        <input type="file" ref="fileInput" @change="onSelectFile">
    </div>
</template>

<script>
    export default {
        props: {
            label: String,
            errorMessages: Array,
        },
        data() {
            return {
                fileName: '',
            };
        },
        methods: {
            openFileChooser() {
                this.$refs.fileInput.click();
            },
            onSelectFile(event) {
                const file = event.target.files[0];

                if(!file) {
                    this.fileName = '';
                    return;
                }

                this.fileName = file.name;

                const fileReader = new FileReader();
                fileReader.readAsDataURL(file);
                fileReader.addEventListener('load', () => {
                    this.$emit('upload', {src: fileReader.result, file});
                });
            }
        },
    }
</script>

<style lang="css">
    input[type=file] {
        display: none;
    }
</style>

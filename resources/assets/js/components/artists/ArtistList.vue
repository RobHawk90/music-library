<template>
    <h1>{{ $t('Artists') }}</h1>
</template>

<script>
    export default {
        created() {
            axios.get('/user').then(res => {
                console.log(res);
            });
        }
    }
</script>

<style lang="scss"></style>

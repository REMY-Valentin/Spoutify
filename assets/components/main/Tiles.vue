<template>
<div>
    <div :key="disque[0]" v-for="disque in disques">
        <Tile
        
        :disque="disque"/>
    </div>
</div>
</template>

<script>
import Tile from '../globals/Tile'

export default {
    name:"Tiles",
    components: {
        Tile
    },
    props: {
        disques: Array
    },
    methods: {
        genreSelect(id) {
            console.log(id)
        }
    },
}
</script>

<style scoped>
    div {
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        margin: 1em;
        

        /* padding: 1em; */
    }
</style>


<template>
    <div>
        <Header />
        <div class="tile">
            <Tile :disque="disque" single="True" />
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from '../globals/Header';
import Tile from '../globals/Tile';
import Footer from '../globals/Footer';
import axios from 'axios';




export default {
    name: 'Main',
    components: {
        Header,
        Tile,
        Footer
    },
    data() {
        return {
            disque: []
        }
    },
    created() {
        let id = document.querySelector('#data').dataset.disqueId
        this.loadDisque(id);
    },
    methods: {
        loadDisque(id) {
            axios.get('https://localhost:8000/disque/'+parseInt(id)).then(response => {
                this.disque = response.data
                //console.log(response.data)
                })
        },
    }
}
</script>

<style scoped>
 .tile {
     display: flex;
     justify-content: center;
     text-align: center;
 }
</style>

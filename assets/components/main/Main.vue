<template>
    <div>
        <Header />
        <div>
            <Tiles :disques="disques" />
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from '../globals/Header';
import Tiles from './Tiles';
import Footer from '../globals/Footer';
import axios from 'axios';



export default {
    name: 'Main',
    components: {
        Header,
        Tiles,
        Footer
    },
    data() {
        return {
            disques: []
        }
    },
    created() {
        this.loadDisque();
    },
    methods: {
        loadDisque() {
            axios.get("https://localhost:8000/disque").then(response => {
                this.disques = response.data
                //console.log(response.data)
                })
        },
        // loadGenre() {
        //     axios.get("https://localhost:8000/genre").then(response => {
        //         this.disques = response.data
        //         console.log(response.data)
        //         })
        // }
    }
}
</script>


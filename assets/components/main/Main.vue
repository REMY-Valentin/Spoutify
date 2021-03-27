<template>
    <div>
        <Header />
        <div id="main">
            <Navbar :navbar="navbar" />
            <Tiles :disques="disques" />
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from '../globals/Header';
import Tiles from './Tiles';
import Footer from '../globals/Footer';
import Navbar from '../globals/Navbar';
import axios from 'axios';



export default {
    name: 'Main',
    components: {
        Header,
        Tiles,
        Navbar,
        Footer
    },
    data() {
        return {
            disques: [],
            navbar: []
        }
    },
    created() {
        this.loadDisque();
        this.loadGenre();
        this.loadAuteur();
        this.loadProd();
    },
    methods: {
        loadDisque() {
            axios.get("https://localhost:8000/disque").then(response => {
                this.disques = response.data
                //console.log(response.data)
                })
        },
        loadGenre() {
            axios.get("https://localhost:8000/genre").then(response => {
                //console.log(response.data)
                this.navbar.push(response.data)
                })
        },
        loadAuteur() {
            axios.get("https://localhost:8000/auteur").then(response => {
                //console.log(response.data)
                this.navbar.push(response.data);
                })
        },
        loadProd() {
            axios.get("https://localhost:8000/producteur").then(response => {
                //console.log(response.data)
                this.navbar.push(response.data);
                })
        }
    }
}
</script>

<style scoped>
   
</style>

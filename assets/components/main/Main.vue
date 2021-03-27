<template>
    <div>
        <Header />
        <div id="main">
            <Navbar 
            @genre-select="genreSelect"
            @auteur-select="auteurSelect"
            @prod-select="prodSelect"
            :navbar="navbar" />
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
        // this.loadGenre();
        // this.loadAuteur();
        // this.loadProd();
        this.loadNavbar();
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
        //         //console.log(response.data)
        //         this.navbar.push({'genre': response.data})
        //         })
        // },
        // loadAuteur() {
        //     axios.get("https://localhost:8000/auteur").then(response => {
        //         //console.log(response.data)
        //         this.navbar.push({'auteur': response.data});
        //         })
        // },
        // loadProd() {
        //     axios.get("https://localhost:8000/producteur").then(response => {
        //         //console.log(response.data)
        //         this.navbar.push({'producteur': response.data});
        //         })
        // },
        loadNavbar() {
            axios.get("https://localhost:8000/navbar").then(response => {
                //console.log(response.data)
                this.navbar = response.data;
                })
        },
        genreSelect(id) {
            axios.get("https://localhost:8000/disque").then(response => {
                this.disques = response.data.filter(disque => disque[6][0] === id)
                //console.log(response.data)
            })
            //this.disques = this.disques.filter(disque => disque[6][0] === id))
        },
        auteurSelect(id) {
            axios.get("https://localhost:8000/disque").then(response => {
                this.disques = response.data.filter(disque => disque[3][0] === id)
                //console.log(response.data, id)
            })
            //this.disques = this.disques.filter(disque => disque[6][0] === id))
        },
        prodSelect(id) {
            axios.get("https://localhost:8000/disque").then(response => {
                this.disques = response.data.filter(disque => disque[4][0] === id)
                //console.log(response.data)
            })
            //this.disques = this.disques.filter(disque => disque[6][0] === id))
        }

    }
}
</script>

<style scoped>
   
</style>

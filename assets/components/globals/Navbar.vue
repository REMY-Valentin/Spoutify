<template>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">   
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Genres
                    </button>
                    <div class="dropdown-menu">
                        <div :key="genre[0]" v-for="genre in navbar[0]"> <button type="button" class="btn btn-outline-info" v-on:click="selectGenre(genre[0])">{{ genre[1] }}</button></div>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Auteurs
                    </button>
                    <div class="dropdown-menu">
                        <div :key="auteur[0]" v-for="auteur in navbar[1]"> <button type="button" class="btn btn-outline-danger" v-on:click="selectAuteur(auteur[0])">{{ auteur[1] }}</button></div>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Producteurs
                    </button>
                    <div class="dropdown-menu">
                        <div :key="prod[0]" v-for="prod in navbar[2]"> <button type="button" class="btn btn-outline-warning" v-on:click="selectProducteur(prod[0])">{{ prod[1] }}</button></div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>

export default {
    name:"Navbar",
    props: {
        navbar: Array
    },
    methods: {
        selectGenre(id) {
            console.log("Genre :", id)
        },
        selectAuteur(id) {
            console.log("auteur : ", id)
        },
        selectProducteur(id) {
            console.log("producteur : ", id)
        }
    },
    mounted() {
        const auteurs = navbar[0];
        const genres = navbar[1];
        return auteurs, genres;
    }
}

</script>

<style scoped>

    .dropdown-menu {
        text-align: center;
    } 

    .dropdown-menu > div {
       display: block;
       margin-top: 0.5em;
    }
    
    .dropdown-menu > button {
        margin: 0.5em;
    }


</style>

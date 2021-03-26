<template>
    <div :id=disque[0] class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ disque[1] }}</h5>
            <p class="card-text">Date de sortie : {{ disque[2]["date"] }}</p>
            <p class="card-text">Auteur : {{ disque[3][1] }}</p>
            <p class="card-text">Producteur : {{ disque[4][1] }}</p>
            <p class="card-text">Rayon : {{ disque[5][1] }}</p>
            <p class="card-text">Genre : {{ disque[6][1] }}</p>

            <a v-if="single !== 'True'" :href="`/disque-detail/${disque[0]}`" class="btn btn-primary">Detail</a>
            <a v-else href="/" class="btn btn-primary">Retour</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Tile",
    props: {
        disque: Array,
        single: String
    },

}
</script>

<style scoped>
   
</style>
<template>
    <div>
        <p>Spoutify © 2021</p>
    </div>
</template>

<script>
export default {
    name: "Footer",
    delimiters: ['${', '}']
}
</script>

<style scoped>
    div {
        position:relative;
        bottom:0;
        width:100%;
        margin-top:2em;
        height:50px;
        border: 1px solid black;
        display: flex;
        justify-content: center;
    }
</style>
let app = Vue.createApp({
    data() {
        return {
            myList: ["vegetables", "cheese", "cookies"],
            num: 10
        }
    }
})

app.component('visualize', {
    props: ["list", "value"],
    template: `
        <p v-for="x in list"> {{x}} </p>
        <h2> {{value}} </h2>
    `
})

app.mount("#vueApp");
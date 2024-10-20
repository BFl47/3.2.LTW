let app = Vue.createApp({
    data() {
        return {
            product: "Cappello",
            description: "Un bellissimo cappello di lana",
            loaded: false,
            details: [
                'Lana a maglia',
                'Pompon tipo racoon',
                'Felpato foderato'
            ],
            variants: [
                {id: 123, disp:12, onSale: true, name: 'nero', color:"black", image: "/assets/black.jpg"},
                {id: 124, disp: 12, onSale: false,  name: 'bianco', color:"white", image: "/assets/white.jpg"},
                {id: 123, disp: 5, onSale: true, name: 'giallo', color:"yellow", image: "/assets/yellow.jpg"},
            ],
            cart: 0,
            varNum: 0
        }
    },
    methods: {
        updateVariant(index) {
            this.varNum = index;
        },
        addToCart() {
            this.cart++;
            this.variants[this.varNum].disp--;
        }
    },
    computed: {
        image() { return this.variants[this.varNum].image; },
        onSale() { return this.variants[this.varNum].onSale; },
        disp() { return this.variants[this.varNum].disp; }
    },
    mounted() {
        window.setTimeout( () => {
            this.loaded = true;
        }, 3000);
    }
});
app.mount('#vueApp');

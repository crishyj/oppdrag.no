<template>
    <div class="section section-grey next-project elementary-banner get-started-section">
        <div class="container element-index text-center">
                <div class="content-sec">
                    <h1>Vi hjelper deg å finne ditt neste store prosjekt. </h1>
                    <p>Uansett hva du har erfaring med, vil vi hjelpe deg med å erobre markedet, vise din ekspertise over hele verden, bli med oss</p>
                    <a @click="onSignup" href="javascript:void(0);" class="btn btn-primary">Kom i gang</a>
                </div>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
            }
        },
        methods: {
            onSignup() {
                this.$emit('onSignup');
            }
        },
    }
</script>

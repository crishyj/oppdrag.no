<template>
            <div class="navigation main-navigation">
                <ul>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/explore">Utforsk</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/join-as-pro">Tilby dine tjenester</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/login">Logg inn</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/sign-up">Registrer deg</router-link></li>
                    <li @click="$emit('clickmenu')"><a href="javascript:void(0);" class="btn btn-primary post-job-btn btn-md" @click.prevent="onPostJob">Legg ut en jobb</a></li>
                </ul>
            </div>
</template>


   <script>
        export default{
            data () {
              return {
            }
        },
        methods: {
            onPostJob() {
                localStorage.clear();
                this.$router.push({name: 'job.create'});
            },
            scrollToTop() {
                window.scrollTo(0,0);
            },                       

        }
    }
</script>
<template>
    <div>
        <div class="main-banner home-banner">
            <div class="main-img">
                <img  :src="headerBanner">
            </div>
            <div class="content">
                <div class="verticle-align">
                    <div class="inner">
                        <div class="container">
                            <div class="content-inner">
                                <h1 class="text-white">Finn leverandøren som passer deg best.</h1>
                                <h5 class="banner-hd-sub">Finn riktig ekspert for å fikse arbeidet ditt hvor som helst og når som helst.</h5>
                                <div class="search-filter">
                                    <div class="custom-multi" :class="{ 'invalid': isInvalid }">
                                        <multiselect  v-model="searchValue" :options="options"  placeholder="Søketjenester" track-by="id" label="title" :loading="isLoading"  id="ajax" open-direction="bottom" :searchable="true" :options-limit="300" :limit="8" :limit-text="limitText" :max-height="600"  @search-change="asyncFind" name="search" :internal-search="false" :showNoResults="true" @select="dispatchAction" @close="dispatchCloseAction" @keyup.enter="validateBeforeSubmit">
                                            <span slot="noResult">No service found.</span>
                                        </multiselect>
                                    </div>
                                    <div class="container-zip-code">
                                        <i class="icon-location"></i>
                                        <input type="number" placeholder="Postnummer" class="form-control lg zip-code" v-model="zipCode" name="zip" style="" :class="[errorBag.first('zip') ? 'is-invalid' : '']" v-validate="'required|numeric'" @keyup.enter="validateBeforeSubmit">
                                    </div>
                                </div>
                                <button :class="[btnLoading  ? 'show-spinner' : '' , 'btn' , 'btn-grey', 'btn-rounded' ]" @click="validateBeforeSubmit" :disabled="loading">
                                    <span class="text-primary">Kom i gang</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--featured categories -->
        <featuredCategories></featuredCategories>
        <!--popular sevice-->
        <popularservices></popularservices>

        <!--how its works-->
        <div class="how-it-work elementary-banner">
            <div class="section-title">
                <h2>Hvordan det fungerer</h2>
            </div>
        </div>
        <div class="section section-primary-gradient how-it-work elementary-banner">
            <div class="container element-index">
                <div class="how-it-work-list">
                    <b-row class="">
                        <b-col sm="12" md="6" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/find-my-friend.svg" width="240">
                            </div>
                        </b-col>
                        <b-col sm="12" md="6">
                            <div class="box">
                                <div>
                                    <h1 class="text-white">Finn en tjenesteleverandør</h1>
                                    <h6 class="mt-3 text-white">Legg ut en jobb for å fortelle oss om oppdraget eller oppgaven din. Vi vil raskt matche deg med den riktige tjenesteleverandøren. </h6>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                </div>
            </div>
        </div>
        <div class="section how-it-work elementary-banner">
            <div class="container element-index">
                <div class="how-it-work-list">
                    <b-row class="">
                        <b-col sm="12" md="6" class="">
                            <div class="box">
                                <div>
                                    <h1>Budprosess</h1>
                                    <h6 class="mt-3">Profesjonelle tjenesteleverandører vil legge inn et bud på jobben din etter å ha evaluert oppgaven din og gi deg et estimat.</h6>
                                </div>
                            </div>
                        </b-col>
                        <b-col sm="12" md="6" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/auction.svg" width="240">
                            </div>
                        </b-col>
                    </b-row>
                </div>
            </div>
        </div>
        <div class="section section-primary-gradient how-it-work elementary-banner">
            <div class="container element-index">
                <div class="how-it-work-list">
                    <b-row class="">
                        <b-col sm="12" md="6" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/conversation.svg" width="240">
                            </div>
                        </b-col>
                        <b-col sm="12" md="6" class="">
                            <div class="box">
                                <div>
                                    <h1 class="text-white">Kommuniser og ansett</h1>
                                    <h6 class="mt-3 text-white">Du kan kommunisere med tjenesteleverandøren før du ansetter. Tildel deretter jobben til riktig tjenesteleverandør.</h6>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                </div>
            </div>
        </div>
        <div class="section how-it-work elementary-banner">
            <div class="container element-index">
                <div class="how-it-work-list">
                    <b-row class="">
                        <b-col sm="12" md="6" class="">
                            <div class="box">
                                <div>
                                    <h1>Jobb og betaling</h1>
                                    <h6 class="mt-3">Tjenesteleverandøren jobber med oppdraget ditt og når du er fornøyd med arbeidet betaler du til tjenesteleverandøren.</h6>
                                </div>
                            </div>
                        </b-col>
                        <b-col sm="12" md="6" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/cash-payment.svg" width="240">
                            </div>
                        </b-col>
                    </b-row>
                </div>
            </div>
        </div>
        <!-- app store section -->
        <div class="section section-grey ready-to-meet">
            <div class="container">
                <div class="two-column">
                    <div class="image-sec">
                        <img src="/images/front/home/job-search.jpeg" style="border-radius: 30px;" class="b-shadow">
                    </div>
                    <div class="content-sec text-right ml-3">
                        <h2 >Trenger du en rørlegger, elektriker eller annet, vi er her for å finne den beste matchen for deg, helt gratis! Bli med du også!</h2>
                        <p>Hva er inkludert? Kostnadsanslag, les anmeldelser og chat i sanntid med tjenesteleverandører, direkte i appen. </p>
                    </div>
                </div>
            </div>
        </div>

        <!--testimonial-section-->
        <div class="section section-grey" v-show="isSuccessStory">
            <div class="container">
                <div class="section-title">
                    <h2 class="btm-space">What our customers are saying</h2>
                    <p>Professional service marketplace has helped tens of thousands of people around US to get the job done.</p>
                </div>
                <testmonial-sec :roleId="3" @onExist="onSuccessStoryExist"></testmonial-sec>
            </div>
        </div>
        <!-- -->
        <div class="section ready-to-meet">
            <div class="container">
                <div class="two-column">
                    <div class="content-sec">
                        <h2>Vi er verdt arbeidet ditt.</h2>
                        <p>Enkle trinn for å få betalt, list opp ferdighetene dine, ha en fin profil, og det er det – du vil bli bombardert med mange jobber. Husk å skaff kunder, demonstrer dine beste ferdigheter. Enkelt å registrere deg som tjenesteleverandør eller virksomhet, bli med på vår tjenestekonto.  </p>
                        <button class="btn btn-primary" @click="JoinUsPro">
                            <span>Bli med</span>
                        </button>
                    </div>
                    <div class="image-sec">
                        <img src="/images/front/home/join-us.jpg" style="border-radius: 30px;" class="b-shadow">
                    </div>
                </div>
            </div>
        </div>

        <!--get started-->
        <div class="section section-grey get-started-section next-project  elementary-banner">
         <explorenow></explorenow>
     </div>
 </div>
</template>


<script>
    import _ from 'lodash';
    export default {
        data() {
            return{
                headerBanner: 'images/front/banners/home.png',
                searchValue: '',
                isLoading: false,
                btnLoading: false,
                loading: false,
                isTouched: false,
                options: [],
                zipCode: '',
                errorMessage: '',
                isSuccessStory: false,
            }
        },
        mounted(){
            this.authUser = JSON.parse(this.$store.getters.getAuthUser);
            this.routeName = 'Explore_Detail';

            if(localStorage['zip']) {
                this.zipCode = localStorage.getItem('zip');
            }else if(this.authUser) {
                this.zipCode = this.authUser.zip_code;
                localStorage.setItem("zip", this.zipCode);
            }
        },
        watch: {
            zipCode(val) {
                if(val.length > 5) {
                    val = val.substr(0, 5);
                }
                this.zipCode = val; 
            },
            searchValue(val) {
                if(val == null) {
                    this.loading = false;
                }
            }
        },
        computed: {
            isInvalid () {
                return this.isTouched && !this.searchValue
            },
        },
        methods: {
            onSuccessStoryExist(val) {
                this.isSuccessStory = val;
            },
            onTouch () {
                this.isTouched = true
            },
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result && !this.loading) {
                        this.ServiceProviderPage();
                        this.errorMessage = "";
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            }, 
            ServiceProviderPage() {

                this.btnLoading = true;
                this.isTouched = false;
                if(!this.searchValue) {
                    this.btnLoading = false;
                    this.isTouched = true;
                    return;
                }
                localStorage.setItem('zip', this.zipCode);
                if(this.searchValue.parent) {

                    localStorage.setItem("parentService", this.searchValue.parent.url_suffix);
                    localStorage.setItem("childService", this.searchValue.url_suffix);
                    this.$router.push({ name: this.routeName, params: { serviceName: this.searchValue.parent.url_suffix, childServiceName: this.searchValue.url_suffix, zip : this.zipCode }});
                }else {

                    localStorage.setItem("parentService", "");
                    localStorage.setItem("childService", this.searchValue.url_suffix);
                    this.$router.push({ name: this.routeName, params: { serviceName: this.searchValue.url_suffix, zip : this.zipCode }});   
                }
            },
            dispatchAction (actionName) {
                this.searchValue = '';
                this.options = [];
                this.loading = false;
            },
            dispatchCloseAction (actionName) {
                this.options = [];
                this.loading = false;
                this.onTouch();
            },
            asyncFind: _.debounce(function(query) {
                let self = this;
                this.loading = true;
                if(!query) {
                    this.loading = false;
                }
                if(!query || query.length < 3) {
                    return;
                };
                this.searchUrl  = 'api/service?keyword=' + query + '&filter_by_status=1&order_by=title';
                this.isLoading = true;
                this.$http.get(this.searchUrl).then(response => {
                    response = response.data;
                    self.options = response.data;
                    self.isLoading = false;

                }).catch(error=>{
                });
            }, 1000),
            limitText (count) {
                return `and ${count} other services`
            },
            SignUp() {
                this.$router.push('explore/service_provider');
            },
            JoinUsPro() {
                this.$router.push('/join-as-pro');
            },
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
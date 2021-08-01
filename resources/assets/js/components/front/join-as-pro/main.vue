<template>
	<div class="content-area">
		<!-- banner section start-->
		<div class="main-banner elementary-banner explore-banner">
			<div class="main-img"><img  :src="bannerimage"></div>
			<div class="content">
				<div class="verticle-align">
					<div class="inner">
						<div class="container p-5" style="border-radius: 20px; background-color: rgba(0,0,0, 0.6);">
							<div class="banner-slogan content-inner">
								<h1 class="text-white">Flere spennende jobber rundt deg</h1>
								<p class="text-white">Å finne arbeid i nærheten har aldri vært enklere. Oppdrag AS - En profesjonell tjeneste for frilansere og tjenester som lar deg finne kunder i ditt lokalområde – der du ønsker å jobbe.</p>
								<a @click="onSignup" href="javascript:void(0);" class="btn btn-primary btn-rounded"><strong class="">Registrer deg idag</strong></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner section end -->

		<!-- Local Work section start-->
		<div class="section services section-local-work two-column">
			<div class="container">
				<div class="section-title">
					<h2>Øk virksomheten din ved å få lokalt arbeid raskere.</h2>
					<p>Ved å bli en profesjonell tjenesteleverandør øker Oppdrag AS virksomheten din på mange måter:</p>
				</div>
				<div class="services-list mt-5">
					<ul>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/profile.svg" width="80"></div>
							</div>
							<div class="list-description">
								<h4>Forretningsprofil</h4>
								<p>Vis omfattende firmadetaljer inkludert forbruker anbefalinger.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/commission.svg" width="100"></div>
							</div>
							<div class="list-description">
								<h4>Ingen provisjon</h4>
								<p>Vi belaster ikke noe gebyr eller betaling fra tjenesteleverandører for vellykkede leads.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/smartphone.svg" width="50"></div>
							</div>
							<div class="list-description">
								<h4>Velg de jobbene du vil ha</h4>
								<p>Vi sender deg nye potensielle kunde og jobber direkte på mobiltelefonen din via push varsler eller e-post.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/chat.svg" width="80"></div>
							</div>
							<div class="list-description">
								<h4>Chat med kunder</h4>
								<p>Når kunden har svart på budet ditt, kan du diskutere detaljer med kunden via en-til-en-chat.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/card.svg" width="100"></div>
							</div>
							<div class="list-description">
								<h4>Ingen kreditt- /debetkort kreves</h4>
								<p>Du trenger ikke å oppgi kreditt- /debetkortet ditt. Du kan belaste kunden i en hvilken som helst av dine eksisterende betalingsmåter.</p>
							</div>
						</li>
						<li>
							<div class="list-image">
								<div class="list-icon"><img src="/images/front/svg/like.svg" width="70"></div>
							</div>
							<div class="list-description">
								<h4>Ingen falske tjenesteleverandører</h4>
								<p>Du trenger ikke å konkurrere mot falske tjenesteleverandører. Vi godkjenner tjenesteleverandører på plattformen etter en nøye vurdering.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Local Work section start-->

		<!--how its works-->
        <div class="section section-primary-gradient how-it-work elementary-banner">
            <div class="container element-index">
				<div class="section-title text-white">
					<h2>Hvordan det fungerer</h2>
				</div>
                <div class="how-it-work-list">
                    <b-row class="">
                        <b-col sm="12" md="6" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/seo.svg" width="240">
                            </div>
                        </b-col>
                        <b-col sm="12" md="6">
                            <div class="box">
                                <div>
                                    <h1 class="text-white">Velg din interesse</h1>
                                    <h6 class="mt-3 text-white">Velg kategorier av interesse og søk i arbeidet ditt på nettstedet.</h6>
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
                                    <h1>Bli shortlisted</h1>
                                    <h6 class="mt-3">Kunder vurderer profilene dine og shortlister deg for å by på jobben.</h6>
                                </div>
                            </div>
                        </b-col>
                        <b-col sm="12" md="6" class="text-center">
                            <div class="icon">
                                <img src="/images/front/svg/list.svg" width="140">
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
                                    <h1 class="text-white">Chat og arranger tilbud</h1>
                                    <h6 class="mt-3 text-white">Chat med kunden for å diskutere jobben eller avtale et besøk som normalt.</h6>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                </div>
            </div>
        </div>
		<!-- How it Work section end-->

		<!-- Ready To Meet section start-->
		<div class="ready-to-meet white-bg section-padd">
			<div class="container">
				<div class="two-column">
					<div class="content-sec">
						<h2>Bli med Oppdrag AS uansett om du er ny i virksomheten eller ny i Oppdrag AS, vi hjelper deg med å utvide virksomheten din.</h2>
						<p>Klar til å møte din neste favorittkunde? Enten du er en ny bedrift eller bare ny i Oppdrag AS, er vi glade for å hjelpe deg å vokse.</p>
						<div class="avability-app">
							<a href="https://itunes.apple.com/us/genre/ios/id36?mt=8" class="apple-store-btn"><img src="/images/front/common-images/app-store.jpg"></a>
							<a href="https://play.google.com/store?hl=en" class="google-store-btn"><img src="/images/front/common-images/google-play.jpg"></a>
						</div>
					</div>
					<div class="image-sec">
						<img src="/images/front/join-as-pro/join.jpeg">
					</div>
				</div>
			</div>
		</div>
		<!-- Ready To Meet section end-->

		<!-- Sucess Stories section start-->
		<div class="next-project section-padd grey-bg" v-show="isSuccessStory">
			<div class="container">
					<div class="section-title">
						<h2>Success Stories</h2>
						<p>Professional service marketplace has helped thousands of service providers around US.</p>
					</div>
					<testmonial-sec @onExist="onSuccessStoryExist" :byRole="2"></testmonial-sec>
			</div>	
		</div>
		<!-- Sucess Stories section end-->	

		<!-- Next Project section start-->
			<getstarted @onSignup="onSignup"></getstarted>
		<!-- Next Project section end-->

	</div>
</template>

<script>
export default {
  data () {
    return {
    		bannerimage: '/images/front/join-as-pro/banner.jpeg',
    		isSuccessStory: false,
    	}
  	},
    methods: {
    	onSuccessStoryExist(val) {
    		this.isSuccessStory = val;
    	},
    	onSignup() {
			this.$router.push({ name: 'sign-up', params: { isPro: 'provider' }});
    	}
    }
}
</script>

<template>
    <div class="profile">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-3 col-lg-2 mb-4">
                    <div class="sidemenu">
                        <div class="profile_card">
                            <div class="card_header">
                                <div class="personal_info">
                                    <div class="image">
                                        <img
                                            :src="`${default_src}/${user.image}`"
                                            alt="User profile picture"
                                            class="profile-user-img img-fluid img-circle"
                                        />
                                    </div>
                                    <h3 class="card-title">Personal Settings</h3>
                                </div>
                            </div>
                            <div class="card_body">
                                <ul class="list-unstyled profile_tabs">
                                    <li class="tab_link">
                                        <a @click.prevent="showContent('profile')" href="#" :class="(show == 'profile')?'active':''">Profile</a>
                                    </li>
                                    <li class="tab_link">
                                        <a @click.prevent="showContent('education')" href="#" :class="(show == 'education')?'active':''">Education</a>
                                    </li>
                                    <li class="tab_link">
                                        <a @click.prevent="showContent('work_experince')" href="#" :class="(show == 'work_experince')?'active':''">Work Experince</a>
                                    </li>
                                    <li id="skills_tab" class="tab_link">
                                        <a @click.prevent="showContent('skills')" href="#" :class="(show == 'skills')?'active':''">Skills</a>
                                    </li>
                                    <li id="cv_tab" class="tab_link">
                                        <a @click.prevent="showContent('cv')" href="#" :class="(show == 'cv')?'active':''">CV</a>
                                    </li>
                                    <li id="languages_tab" class="tab_link">
                                        <a @click.prevent="showContent('languages')" href="#" :class="(show == 'languages')?'active':''">Languages</a>
                                    </li>
                                    <li id="portfolio_tab" class="tab_link">
                                        <a @click.prevent="showContent('portfolio')" href="#" :class="(show == 'portfolio')?'active':''">Portfolio</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mb-4">
                    <Profile v-if="show == 'profile'" :defaultSrc="default_src"></Profile>
                    <Education v-if="show == 'education'"></Education>
                    <Work_Experince v-if="show == 'work_experince'"></Work_Experince>
                    <Skills v-if="show == 'skills'" :public_path="default_src"></Skills>
                    <CV v-if="show == 'cv'" :public_path="default_src" :user_id="user.id"></CV>
                    <Languages v-if="show == 'languages'"></Languages>
                    <Portfolio v-if="show == 'portfolio'" :public_path="default_src"></Portfolio>
                </div>
                <div class="col-md-2 col-lg-1 col-sm-4 mb-4">
                    <ProfileImage @newImg="newImg" :defaultSrc="default_src"></ProfileImage>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'default_src'
    ],
    data(){
        return{
            show: 'profile',
            user:{}
        }
    },
    mounted(){
        this.user_data()
    },
    methods:{
        showContent(value){
            this.show = value
        },
        user_data(){
            axios.get(`/admin/user_data`)
            .then((res) => {
                this.user = res.data
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        },
        newImg(data){
            this.user.image = data.image
        },
    }
}
</script>

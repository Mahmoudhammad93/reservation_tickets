<template>
    <div class="resume">
        <header>
          <div class="demo">
              <div class="content">
                 <div id="large-header" class="large-header">
                    <canvas id="demo-canvas"></canvas>
                    <div class="logo">
                        <img :src="`${temp_src}/img/m-logo.png`" alt="Logo Image">
                    </div>
                    <h1 class="main-title"><span class="thin">Welcome</span></h1>
                    <div id="text-header"></div>
                 </div>
                 <div class="v-card wow fadeInDown">
                     <div class="card-img">
                          <a :href="`${public_path}/${user.image}`" data-lightbox="roadstrip">
                              <img :src="`${public_path}/${user.image}`" alt="V-Card Image">
                         </a>
                     </div>
                     <div class="card-body p-3 pl-4">
                         <div class="card-header pl-0">
                             <h4 class="title">
                                 {{user.first_name+ ' ' +user.last_name}}
                             </h4>
                             <p class="desc">
                                  {{user.job_title}}
                             </p>
                         </div>
                         <div class="card-content">
                             <P class="desc">
                                  {{user.cover_letter}}
                             </P>
                             <ul class="social list-unstyled">
                                 <li>
                                     <i class="fa fa-envelope"></i>
                                     <p>{{user.email}}</p>
                                 </li>
                                 <li>
                                     <i class="fa fa-map-marker"></i>
                                     <p>{{user.address}}</p>
                                 </li>
                                 <li>
                                     <i class="fa fa-mobile"></i>
                                      <p>
                                     {{user.another_phone}}
                                     -
                                     {{user.phone}} <img class="whats" :src="`${temp_src}/img/whats.png`">
                                     </p>
                                 </li>
                             </ul>
                             <div class="cv wow fadeInDown">
                              <h2>
                                Download my Cv:
                                <a :href="`${public_path}/${cv}`" class="fa fa-file-pdf-o" download="Mahmoud Hammad-Cv" target="_blank"></a>
                              </h2>
                            </div>
                         </div>
                     </div>
                 </div>
              </div>
           </div>
        </header>
        <!-- /end header -->

        <!-- Start Empty-->
        <div class="empty"></div>
        <!-- /end empty-->

        <!-- Start About Me-->
        <section class="about-me">
            <div class="header">
                <h3 class="title">
                    About Me
                </h3>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aboutMe-box">
                            <div class="aboutMe-img">
                                <div class="overlay-fixed"></div>
                                <img :src="`${temp_src}/img/about-me.png`" alt="About Me Image">
                            </div>
                            <div class="desc">
                                <p class="p1">
                                    Hello! My name is Mahmoud Hamde Hammad and I'm Web Developer. I have experience in developing a real-time web applications, complex front-end and back-end management systems, social platform applications. All my projects based on and PHP5 in conjunction with other modern web technologies. PHP (native PHP, Laravel), MySQL, jQuery, SASS, HTML5, CSS3, Basic Knowledge in( Angular.js/React.js )are used. While developing an application I always keep in mind SEO optimization and social integration. Furthermore, I'm trying to make my code as clean as possible. In addition, I can convert designs to high quality, cross-browser compatible HTML5/CSS3 markup
                                </p>
                                <p class="p2">
                                    I seeking for a Good long term career opportunity in a respectful company that will enhance and develop my future career. Developing clear, effective and accurate documents for tailored software packages. I have 2 years experience in front end and 8 months in backend and ability to learn new skills Interesting in being Great Programmer in Web. Hope to make apps to help people to make their life easie . now I’m learning Ionic .
                                </p>
                                <a href="#" class="more-text text-right">Read More <i class="fa fa-arrow-right"></i></a>
                                <a href="#" class="back text-right"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /end about me-->

        <!-- Start My Skills -->
        <section class="my-skills">
            <div class="header">
                <h3 class="title">
                    My Skills
                </h3>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4" v-for="skill in user.skills" :key="skill.id">
                        <div class="box text-center wow fadeInDown" v-bind:class="skill.name" :style="`border-bottom:4px solid ${skill.color};padding: 1rem 3rem`">
                            <div class="box-img">
                                <img :src="`${public_path+'/'+skill.image}`" alt="HTML Icon">
                            </div>
                            <div class="box-header">
                                <h4 class="title">
                                    {{skill.name}}
                                </h4>
                            </div>
                            <div class="progress-box wow fadeInDown">
                                <h5><span class="color-heading pull-right">{{skill.percent}}%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-color-base" role="progressbar" :style="`width: ${skill.percent}%`" :data-width="skill.percent"></div>
                                </div>
                            </div>
                            <div class="box-desc">
                                <p> {{skill.description}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /end my skills -->

        <!-- Start Portfolio -->
        <section class="portfolio popup-gallery">
            <div class="header">
                <h3 class="title">
                    Portfolio
                </h3>
            </div>
            <div class="container">
                <div class="col-lg-12 lay">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4" v-for="project in user.portfolio" :key="project.id">
                            <div class="img wow fadeInDown">
                                <div class="overlay">
                                    <a :href="`${public_path}/${project.image}`" class="fa fa-eye" data-lightbox="roadtrip"></a>
                                    <a :href="`${project.link}`" class="fa fa-link" target="_blank"></a>
                                </div>
                                <img :src="`${public_path}/${project.image}`">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /end portfolio -->

        <!-- Start Footer -->
        <footer class="footer">
            <section class="contact-me">
                <div class="header">
                    <h4 class="title">
                        Contact Me
                    </h4>
                </div>
                <div class="container">
                <div class="info">
                    <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="logo  wow fadeInLeft" >
                        <a href="#">
                            <img :src="`${temp_src}/img/m-logo.png`" class="img-responsive" data-value="head">
                        </a>
                        </div>
                        <div class="describe  wow fadeInDown" >
                        <p>
                            I seeking for a Good long term career opportunity in a respectful company that will enhance and develop my future career. Developing clear, effective and accurate documents for tailored software packages. I have 2 years experience in front end and 8 months in backend and ability to learn new skills Interesting in being Great Programmer in Web. Hope to make apps to help people to make their life easie " now i learning ionic "
                            <div class="signature pull-right">
                            <h5>
                                signature :-
                            </h5>
                            <span>
                                Mahmoud Hammad
                            </span>
                            </div>
                        </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="clearfix"></div>
                        <div class="row">
                        <div class="col-lg-10 col-lg-offset-2">
                            <div class="contact-head">
                            </div>
                            <form id="contact" class="form-contact wow fadeInDown" @submit="contact_us()">
                            <div class="form-group">
                                <input
                                class="username form-control"
                                type="text"
                                name="username"
                                placeholder="Type Your Name"
                                v-model="msg.name"
                                value="">
                                <i class="fa fa-user fa-fw"></i>
                                <span class="asterisx"></span>
                                <span class="fa fa-check"></span>
                                <div class="alert alert-danger alert-dismissible custom-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong> Oh snap! </strong> Your Name Must Be Larger Than 5 charcters
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                id="tip_email"
                                class="email form-control"
                                type="email"
                                name="email"
                                placeholder="E-mail"
                                v-model="msg.email"
                                value="">
                                <i class="fa fa-envelope fa-fw"></i>
                                <span class="asterisx textarea"></span>
                                <span class="fa fa-check textarea"></span>
                                <div class="alert alert-danger alert-dismissible custom-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong> Oh snap! </strong> Put Your E-mail
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                class="phone form-control"
                                type="text"
                                name="cellphone"
                                placeholder="Type Your Phone"
                                v-model="msg.phone"
                                value="">
                                <i class="fa fa-phone fa-fw"></i>
                                <span class="asterisx"></span>
                                <span class="fa fa-check"></span>
                                <div class="alert alert-danger alert-dismissible custom-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong> Oh snap! </strong> Type Your Phone
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea
                                class="message form-control"
                                name="message"
                                rows="4"
                                v-model="msg.message"
                                placeholder="Type Your Message:"></textarea>
                                <span class="asterisx textarea"></span>
                                <span id="check" class="fa fa-check textarea"></span>
                                <div class="alert alert-danger alert-dismissible custom-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong> Oh snap! </strong> Message Can't be Less Than 10 charcters
                                </div>
                            </div>
                            <div class="btn-submit">
                                <input
                                id="btn-submit"
                                class="btn btn-info btn-block"
                                type="submit"
                                name="submit"
                                value="Send Message"
                                onsubmit="submitajaxform();">
                                <span class="before"></span>
                                <span class="after"></span>
                            </div>
                            <input
                                type="hidden"
                                id="ad_id"
                                name="ad_id" />
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </section>
        </footer>
        <!-- Start Copyright -->

        <!-- Start Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <p>
                            Made with
                            <i id="heart" class="fa fa-heart animated Pulse"></i>
                            by
                            <strong>
                            <a href="https://www.facebook.com/mahmoud.h.hammad.1" target="_blank">
                                Mahmoud Hammad
                            </a>
                            </strong>
                        </p>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="social">
                            <ul class="social-icon list-unstyled">
                                <li>
                                    <a href="https://www.facebook.com/mahmoud.h.hammad.1" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                    <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/MahmoudHammad93" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://myaccount.google.com/?utm_source=OGB&utm_medium=act&pli=1" target="_blank">
                                    <i class="fa fa-google-plus-square"></i>
                                    <i class="fa fa-google-plus-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/mahmoud-hammad-29a3ab15a/" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                    <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://codepen.io/mahmoud_hammad93/" target="_blank">
                                    <i class="fa fa-codepen"></i>
                                    <i class="fa fa-codepen"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://github.com/Mahmoudhammad93" target="_blank">
                                    <i class="fa fa-github"></i>
                                    <i class="fa fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright -->
        <!--Start Scroll To Top-->
        <div id="scroll-top">
            <a href="#" data-value="hom">
                <i class="fa fa-angle-up fa-2x"></i>
            </a>
        </div>
        <!--End Scroll To Top-->
        <!-- Start Loading Page -->
        <div id="loading-page" class="loading-page">
            <div class="sk-circle">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
            </div>
            <div class="text-holder text-center">
                <h3>Mahmoud Hammad</h3>
                <h6>Engineer and software developer</h6>
            </div>
        </div>
        <!-- End Loading Page -->
    </div>
</template>

<script>
export default {
    props:[
        'temp_src',
        'public_path',
        'public'
    ],
    data(){
        return{
            user:{},
            cv:'',
            msg:{}
        }
    },
    mounted(){
        this.get_resume_info()
        console.log(this.user)
    },
    created(){

    },
    methods:{
        tempSrc(){
            return this.temp_src
        },
        get_resume_info(){
            axios.get(`get_resume_info`).then((res) => {
                this.user = res.data
                this.cv = res.data.cv.file
                console.log(res.data)
            })
        },
        contact_us(){
            axios.post(`/admin/contact_us`,this.msg)
            .then((res)=> {
                Vue.$toast.success('Message Sent Successfully.', {})
                this.msg.name = ''
                this.msg.email = ''
                this.msg.phone = ''
                this.msg.message = ''
            }).catch((err) =>{
                Vue.$toast.error(err, {})
            })
        }
    }
}
</script>

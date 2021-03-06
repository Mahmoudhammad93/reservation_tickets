<template>
  <div class="cv">
    <div class="card">
      <div class="card-body">
          <h4 class="title p-3">Upload Your CV</h4>
        <div class="resume">
          <div class="file_img">
            <img v-if="resume_extention == 'pdf'" :src="public_path+'/images/icons/pdf.png'" alt="">
            <img v-else :src="filesSrc()" />
          </div>
          <div class="file_info">
            <a :href="`${public_path}/${resume.file}`" class="file_name" target="_blank">{{resume.file}}</a>
          </div>
        </div>
        <input
          type="file"
          name="cv"
          id="cv"
          ref="file"
          style="display: none"
          @change="upload()"
        />
        <label for="cv" v-if="show">
          <div class="upload-progress" v-if="!selected">
            <div class="file_img">
              <img v-if="file_extention == 'pdf'" :src="public_path+'/images/icons/pdf.png'" alt="">
              <img v-else :src="filesSrc()" />
            </div>
            <div class="info">
              <a :href="filesSrc()" class="file_name" target="_blank">{{file.name}}</a>
              <div class="progress">
                <div class="progress-bar" role="progressbar" :style="{width: progress+'%'}" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">{{progress}}%</div>
              </div>
            </div>
          </div>
          <i class="mdi mdi-cloud-upload"></i>
          <span>
            Upload Your CV
          </span>
        </label>
        <div class="mt-4">
            <a href="" @click.prevent="show =! show" v-if="show">- Cancel</a>
            <a href="" @click.prevent="show =! show" v-else>+ Add CV</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
      "user_id",
      "public_path"
  ],
  data() {
    return {
        selected: true,
        file:{
          name:'default.png'
        },
        progress: null,
        fileReault:{
          file:'default.png',
        },
        file_extention:null,
        resume:{},
        resume_extention:null,
        show: false
    };
  },
  mounted() {},
  created() {
    this.get_resume();
  },
  methods: {
    upload() {
        this.file = this.$refs.file.files[0];
        this.selected = false;
        const form = new FormData();
        form.append('file', this.file);
        return axios.post(`/admin/upload_cv`, form, {"Content-Type": "multipart/form-data",
          onUploadProgress: (event) => {
            this.progress = Math.ceil((event.loaded / event.total) * 100);
            this.$forceUpdate();
          },
        }).then((res) => {
            this.fileReault = res.data
            this.file_extention = this.fileReault.file.split('.').pop()
            setTimeout(function(){
              this.selected = true
            },1000)
        })
    },
    filesSrc(){
      return this.public_path + '/' + this.fileReault.file
    },
    get_resume(){
      axios.get(`/admin/get_cv`).then((res) => {
        this.resume = res.data
        console.log(res.data)
        this.resume_extention = res.data.file.split('.').pop()
      })
    }
  },
};
</script>

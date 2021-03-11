<template class="profile_image">
    <div class="profile_image img">
      <label class="label-img" for="image">
        <img class="profile-user-img img-fluid img-circle" v-if="file.image != null" :src="`${defaultSrc}/${file.image}`" id="image-field" />
        <img class="profile-user-img img-fluid img-circle def" v-else :src="`${defaultSrc}/default.png`" id="image-field" />
        <span class="before">
        <svg
            height="16"
            width="16"
            class="octicon octicon-pencil"
            viewBox="0 0 16 16"
            version="1.1"
            aria-hidden="true"
        >
          <path
              fill-rule="evenodd"
              d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"
          ></path>
        </svg>
       Edit
      </span>
      </label>
      <input
          id="image"
          ref="file"
          class="form-control image"
          type="file"
          name="image"
          value=""
          onchange="previewImage(event,'image-field')"
          v-on:change="handleImage()"
        />
    </div>
</template>

<script>
import axios from "axios";
export default {
  props: ['defaultSrc'],
  data(){
    return{
      file:{}
    }
  },
  created() {
    this.getImage();
  },
  methods:{
    handleImage(){
      // console.log(this.$refs.file.files[0])
      this.file = this.$refs.file.files[0];
      let formData = new FormData();
      formData.append('image', this.file);
      axios.post(`/admin/image_update`,formData, {"Content-Type": "multipart/form-data"})
      .then((res) => {
        console.log(res.data);
        Vue.$toast.success('Profile image changed successfully.', {})
        this.$emit('newImg',res.data)
      });
    },
    getImage() {
      axios.get(`/admin/user_data`).then((res) => {
        this.file = res.data;
        console.log(res.data)
      });
    },
  },
};
</script>

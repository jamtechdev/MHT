<template>
  <div>
    <form
        :action="formUrl"
        method="POST"
        enctype="multipart/form-data"
        id="discipine_logo_upload_form"
        ref="discipine_logo_upload_form"
        >
        <input type="hidden" name="discipine_id" value="discipineId" />

        <div class="custom-file">
            <input
            id="discipline_logo"
            type="file"
            class="form-control"
            name="discipline_logo"
            accept=".jpg, .jpeg, .png"
            @change="getImage($event)"
            required
            />
            <label
            for="company_logo"
            ref="logo_label"
            class="custom-file-label logo-file-label"
            >
            </label>
        </div>

        <div class="col-md-5 d-none" id="image_preview_div">
        <img src="" alt="" id="image_preview" width="200px" height="200px" />
        </div>

    </form>

    <div
      class="modal fade closemodal"
      id="modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalLabel"
      aria-hidden="true"
      ref="modal"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop the image</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img
                id="image"
                :src="image_url"
                ref="crop_image"
                width="400px"
                height="400px"
              />
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button
              type="button"
              class="btn btn-primary dashboard_btn_danger close"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn btn-secondary"
              id="crop"
              @click="cropIt()"
            >
              Crop And Upload
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-5" id="uploaded_image_div" v-if="uploadedImageUrl">
        <a :href="uploadedImageUrl ? uploadedImageUrl : 'javascript:;'">
          <img
            :src="uploadedImageUrl ? uploadedImageUrl : 'javascript:;'"
            alt="OOPs ! Image Not Found"
            id="uploaded_image"
            width="200px"
            height="200px"
            class="fit-cover"
          />
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["form-url", "instructor-id", "instructor-image"],
  data() {
    return {
      image_url: "",
      cropper: null,
      uploadedImageUrl: null,
    };
  },
  mounted() {
    this.uploadedImageUrl = this.disciplineLogo;
    $(this.$refs.modal).on("hidden.bs.modal", () => {
      this.resetCropper();
    });
  },
  methods: {
    getImage(event) {
      const file = event.target.files[0];
      const url = URL.createObjectURL(file);
      this.image_url = url;
      $(this.$refs.modal).modal("show");

      $(this.$refs.modal).on("shown.bs.modal", () => {
        this.resetCropper();
        this.cropper = new Cropper(this.$refs.crop_image, {
          viewMode: 1,
          dragMode: "move",
        //   aspectRatio: 1,
          checkOrientation: true,
          cropBoxMovable: true,
          cropBoxResizable: true,
          // zoomOnTouch: false,
          // zoomOnWheel: true,
          guides: true,
          highlight: true,
          preview: ".preview",
        });
      });
    },
    cropIt() {
      const canvas = this.cropper.getCroppedCanvas({
        minWidth: 256,
        minHeight: 256,
        maxWidth: 1096,
        maxHeight: 1096,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
      });

      $(this.$refs.modal).modal("hide");
      canvas.toBlob((blob) => {
        var formData = new FormData();
        formData.append("instructor_image", blob);
        formData.append("instructor_id", this.instructorId);
        axios({
            // headers: { 'content-type': 'application/x-www-form-urlencoded' },
          url: this.formUrl,
          method: "POST",
          data: formData,
        })
          .then((response) => {
            const res = response.data;
            if (res.status) {
              this.resetCropper();
              this.uploadedImageUrl = res.file_url;
              toastr.success(res.message);
              window.location.reload();
            } else {
              toastr.error(res.message);
            }
          })
          .catch((error) => {
            toastr.error(error);
            window.location.reload();
          });
      });
    },
    resetCropper() {
      if (this.cropper != null) {
        this.cropper.destroy();
      }
      this.cropper = null;
      this.$refs.logo_label.innerHTML = "";
      this.$refs.discipine_logo_upload_form.reset();
    },
  },
  computed: {},
  watch: {},
};
</script>

<style scoped>
.img-container img {
  max-width: 100%;
}
.fit-cover {
    object-fit: cover;
}
</style>

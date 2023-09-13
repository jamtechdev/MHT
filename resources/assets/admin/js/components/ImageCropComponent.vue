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
      <div class="row">
        <div class="col-md-4">
          <div class="custom-file">
            <input
              id="discipline_logo"
              type="file"
              class="custom-file-input"
              name="discipline_logo"
              accept=".jpg, .jpeg, .png"
              @change="getImage($event)"
              required
            />
            <label
              for="company_logo"
              ref="logo_label"
              class="custom-file-label logo-file-label"
              >Choose file...
            </label>
          </div>
        </div>

        <div class="col-md-5 d-none" id="image_preview_div">
          <img src="" alt="" id="image_preview" width="200px" height="200px" />
        </div>
      </div>
    </form>

    <div
      class="modal fade"
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
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
              @click="resetCropper()"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn btn-primary"
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
  props: ["form-url", "discipline-id", "discipline-logo"],
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
          aspectRatio: 1,
          checkOrientation: false,
          cropBoxMovable: false,
          cropBoxResizable: false,
          // zoomOnTouch: false,
          // zoomOnWheel: true,
          guides: false,
          highlight: false,
          preview: ".preview",
        });
      });
    },
    cropIt() {
      const canvas = this.cropper.getCroppedCanvas({
        width: 160,
        height: 160,
      });

      $(this.$refs.modal).modal("hide");
      canvas.toBlob((blob) => {
        var formData = new FormData();
        formData.append("discipline_logo", blob);
        formData.append("discipline_id", this.disciplineId);
        axios({
        //   headers: { 'content-type': 'application/x-www-form-urlencoded' },
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
            } else {
              toastr.error(res.message);
            }
          })
          .catch((error) => {
            toastr.error(error);
          });
      });
    },
    resetCropper() {
      if (this.cropper != null) {
        this.cropper.destroy();
      }
      this.cropper = null;
      this.$refs.logo_label.innerHTML = "Choose file...";
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
</style>

<template>
    <div class="d-flex align-items-start align-items-sm-center upload-image gap-4">
        <div class="image" v-if="preview">
            <img :src="preview" alt="image" class="d-block rounded">
        </div>
        <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
                <span class="d-none d-sm-block">Завантажити</span>
                <i class="ti ti-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" name="image" accept="image/png, image/jpeg, image/jpg" @change="previewImage" hidden>
            </label>

            <div class="text-muted">Доступо до завантаження JPG, JPEG, PNG. Максимальний розмір: 1MB</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        image: null
    },

    data() {
        return {
            file: null,
            preview: null
        }
    },


    created() {
        this.preview = this.image
    },

    methods: {
        reset: function () {
            this.preview = null
        },

        previewImage: function(event) {
            // Reference to the DOM input element
            let input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                let reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.preview = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}
</script>


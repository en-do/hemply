<template>
    <div>
        <QuillEditor
            contentType="html"
            :toolbar="customToolbar"
            useCustomImageHandler
            @image-added="handleImageAdded"
            v-model:content="editor"
        >
        </QuillEditor>

        <textarea :name="name" :id="name" class="form-control d-none">{{ editor }}</textarea>

        <div class="clear"></div>
    </div>
</template>

<script>
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    components: {
        QuillEditor
    },

    props: {
        name: {
            type: String,
            default: 'description'
        },
        content: {
            type: String,
            default: 'description'
        }
    },

    data() {
        return {
            editor: null,
            customToolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'header': [2, 3, 4, 5, 6, false] }],
                ['blockquote'],
                [{ 'color': [] }, { 'background': [] }],
                [{'list': 'ordered'}, {'list': 'bullet'}],
                ["link", "image", "video"]
            ]
        }
    },

    methods: {
        handleImageAdded: function (file, Editor, cursorLocation, resetUploader) {
            const formData = new FormData();
            formData.append("image", file);

            fetch("/posts/upload/image",
                {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.image)

                    Editor.insertEmbed(cursorLocation, "image", data.image);
                    resetUploader();
                })
                .catch(error => {
                    console.error("Error:", error)
                })


        },

        upload: function (file) {

        }
    },

    mounted() {
        this.editor = this.content
    }
}
</script>

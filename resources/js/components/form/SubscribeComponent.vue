<template>
    <form method="post" class="pt-4 ms-auto me-auto" @submit="submit($event)">
        <div class="input-group">
            <input type="text" name="email" class="form-control py-2 px-3" placeholder="Ваш email" v-model="email">

            <button type="submit" class="btn btn-primary fw-bold">Підписатись</button>
        </div>

        <div class="alert alert-danger mt-4 mb-0" v-if="error">{{ error }}</div>
        <div class="alert alert-success mt-4 mb-0" v-if="success">{{ success }}</div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            email: null,
            success: null,
            error: null
        }
    },

    methods: {
        submit: function (e) {
            e.preventDefault()

            this.send()

            setTimeout(()=>{
                this.clear()
            }, 6000)
        },

        clear: function () {
            this.email = null
            this.success = null
            this.error = null
        },

        send: function () {
            let email = this.email
            let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

            const requestOptions = {
                method: 'POST',
                headers: { 'Content-type': 'application/json; charset=UTF-8' },
                body: JSON.stringify({
                    _token: csrf,
                    email: email
                })
            };

            fetch('/news/subscribe', requestOptions)
                .then(async response => {
                    const data = await response.json();

                    // check for error response
                    if (!response.ok) {
                        // get error message from body or default to response status
                        const error = (data && data.error) || response.status;

                        return Promise.reject(error);
                    }

                    if(response.status !== 419) {
                        const success = (data && data.success) || response.status;

                        this.clear()
                        this.success = success;
                    }

                })
                .catch(error => {
                    this.clear()
                    this.error = error;
                    //console.error(error);
                });
        }
    }
}
</script>

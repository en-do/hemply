<template>
    <div class="row">
        <div class="col-12 col-md-4 mb-4">
            <label for="effect" class="form-label fw-bold">Ефекти</label>
            <select id="effect" class="form-select"></select>
        </div>

        <div class="col-12 col-md-3 mb-4">
            <label for="score" class="form-label fw-bold">Значення</label>
            <input type="number" id="score" class="form-control" min="0" step="0.1" value="0">
        </div>

        <div class="col-12 col-md-3 mb-4">
            <label for="order" class="form-label fw-bold">Сортування</label>
            <input type="number" id="order" class="form-control" min="0" step="1" value="0">
        </div>

        <div class="col-12 col-md-2 mb-4 pt-md-3 mt-md-3">
            <button class="btn btn-primary w-100">Додати запис</button>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

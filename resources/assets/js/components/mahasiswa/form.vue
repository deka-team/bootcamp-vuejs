<script>
export default{
    props: {
        item: {
            type: Object,
            default(){
                return {
                    id: '',
                    nim: '',
                    nama: ''
                }
            }
        }
    }
}
</script>
<template>
    <div>
        <div class="form-group">
            <label for="control-label">NIM</label>
            <input type="text" v-model="item.nim" class="form-control">
        </div>
        <div class="form-group">
            <label for="control-label">NAMA</label>
            <input type="text" v-model="item.nama" class="form-control">
        </div>
        <div class="form-group">
            <button @click="$parent.save" class="btn btn-primary">
                <i v-if="$parent.loading" class="fa fa-spinner fa-spin"></i>
                <i v-else class="fa fa-save"></i>
                SIMPAN
            </button>
        </div>
    </div>
</template>

<script>

import mahasiswaForm from './form.vue'

export default{
    name: 'Mahasiswa',
    components: {mahasiswaForm},
    data: () => ({
        mahasiswa: [],
        item: {
            id: '',
            nim: '',
            nama: ''
        },
        loading: false
    }),
    mounted(){
        this.fetchMahasiswa()
    },
    methods: {
        fetchMahasiswa(){
            this.loading = true
            axios.get('/api/mahasiswa').then(response => {
                this.loading = false
                const {data} = response

                this.mahasiswa = Object.assign([], data)
            })
        },
        storeMahasiswa(){
            const data = this.item
            this.loading = true
            axios.post('/api/mahasiswa', data).then(response => {
                this.loading = false
                this.reset()
                this.fetchMahasiswa()
            })
        },
        updateMahasiswa(){
            const data = this.item
            this.loading = true
            axios.put(`/api/mahasiswa/${data.id}`, data).then(response => {
                this.loading = false
                this.reset()
                this.fetchMahasiswa()
            })
        },
        deleteMahasiswa(item){
            this.loading = true
            axios.delete(`/api/mahasiswa/${item.id}`).then(response => {
                this.loading = false
                this.fetchMahasiswa()
            })
        },
        remove(item){
            const konfirmasi = confirm('Anda yakin akan menghapus data ini?')

            if(konfirmasi){
                this.deleteMahasiswa(item)
            }
        },
        save(){
            if(this.item.id === ''){
                this.storeMahasiswa()
            }else{
                this.updateMahasiswa()
            }
        },
        edit(item){
            this.item = Object.assign({}, item)
        },
        reset(){
            this.item = {
                id: '',
                nim: '',
                nama: ''
            }
        },
    }
}
</script>

<template>
    <div class="container">
        <h2 class="page-title">
            Mahasiswa
        </h2>

        <mahasiswa-form :item="item"></mahasiswa-form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="30">No</th>
                    <th width="100">NIM</th>
                    <th>Nama</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in mahasiswa">
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.nim }}</td>
                    <td>{{ item.nama }}</td>
                    <td align="center">
                        <a @click="edit(item)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a @click="remove(item)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <tr v-if="mahasiswa.length === 0">
                    <td align="center" colspan="4">Tidak ada data</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style lang="scss" scoped>
    .container{
        background: #F1F1F1;
    }
</style>

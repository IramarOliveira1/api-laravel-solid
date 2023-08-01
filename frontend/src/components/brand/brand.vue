<template>
    <v-container>
        <div class="">
            <v-btn color="success" class="store">CADASTRAR</v-btn>
        </div>
        <v-table>
            <thead>
                <tr>
                    <th class=" text-left">
                        ID
                    </th>
                    <th class="text-left">
                        Nome
                    </th>
                    <th class="text-left">
                        Ação
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="brand in brands.data" :key="brand.id">
                    <td>{{ brand.id }}</td>
                    <td>{{ brand.name }}</td>
                    <td>
                        <v-btn color="orange"><v-icon color="white" icon="mdi:mdi-pencil" /></v-btn>
                        <v-btn color="red" @click="handleDelete(brand.id)"><v-icon icon="mdi:mdi-delete" /></v-btn>
                    </td>
                </tr>
            </tbody>
        </v-table>
        <div class="text-center">
            <v-pagination v-model="page" :length="brands.meta?.last_page" :total-visible="7"
                rounded="circle"></v-pagination>
        </div>
    </v-container>
</template>

<script>
import axios from '../../service/api.js';
export default {
    data() {
        return {
            brands: [],
            dialog: false,
            page: isNaN(Number(this.$route.query.page)) ? 1 : Number(this.$route.query.page),
        }
    },
    mounted() {
        this.all();
    },
    watch: {
        page() {
            this.$router.push({ path: this.$route.path, query: { page: this.page } });
            this.$route.query.page = this.page;
            this.all();
        },
    },
    methods: {
        async all() {
            const { data } = await axios.get(`/brand?page=${this.$route.query.page ?? 1}`);
            this.brands = data;
        },
        async update(id) {
            const { data } = await axios.put(`/brand/${id}`);
            this.brands = data.data;
        },
        handleDelete(id) {
            this.$swal.fire({
                icon: 'info',
                title: 'Deseja realmente excluir essa marca ?',
                showCancelButton: true,
                cancelButtonText: 'Não',
                confirmButtonText: 'Sim',
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const { data } = await axios.delete(`/brand/${id}`);
                    this.all();
                    this.dialogMessage('success', data.message);
                }
            }).catch(error => {
                this.dialogMessage('error', error.message);
            })
        },

        dialogMessage(type, message) {
            const dialog = this.$swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', this.$swal.stopTimer)
                    toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                }
            });

            dialog.fire({
                icon: type,
                title: message
            });
        }
    }
}
</script>
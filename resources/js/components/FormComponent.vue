<template>
    <div class="card text-bg-primary">
        <div class="card-header">¿En qué estás pensando ahora?</div>

        <div class="card-body">
            <h5 class="card-title">Ahora estoy pensando en:</h5>
            <form action="" v-on:submit.prevent="newThought()">
                <div class="form-group">
                   <!--  <label for="thought">Ahora estoy pensando en:</label> -->
                   
                    <input type="text" class="form-control" name="thought" v-model="description">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">
                     Enviar pensamiento
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                description: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newThought() {
                const params = {
                    description: this.description
                };
                this.description = '';

                axios.post('/thoughts', params)
                    .then((response) => {
                        const thought = response.data;
                        this.$emit('new', thought);
                    });
            }
        }
    }
</script>

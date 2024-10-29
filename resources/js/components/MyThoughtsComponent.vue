<template>

            <div class="row">

                <div class="col-md-8 col-md-offset-2">
                    <!-- Al apretar el boton se llama al evento addThought -->
                    <form-component @new="addThought"></form-component>
         
                    <br>

                    <thought-component 
                    v-for="(thought, index) in thoughts" 
                    :key="thought.id"
                    :thought="thought"
                    @update="updateThought(index, ...arguments)"
                    @delete="deleteThought(index)"> <!-- aqui enviamos informacion de un componente hijo a un componente padre -->
                    </thought-component>
                </div>

            </div>

</template>

<script>
// Importa los componentes que quieres usar dentro de este componente
import FormComponent from './FormComponent.vue';
import ThoughtComponent from './ThoughtComponent.vue';

export default {
    components: {
        'form-component': FormComponent,
        'thought-component': ThoughtComponent
    }, 
    data() {
        return {
            thoughts: []
        }
    },
    mounted() {
        /* console.log('MyThoughtsComponent mounted.'); */
        axios.get('/thoughts').then((response) => {
                this.thoughts = response.data;
            });
    },
    methods: {
        addThought(thought) { /* Aqui recibimos lo que el componente hijo envia */
         this.thoughts.push(thought);
        },
        updateThought(index, thought) {
            this.thoughts[index] = thought;
        },
        deleteThought(index) {
            this.thoughts.splice(index, 1);
        }

    }

}


</script>

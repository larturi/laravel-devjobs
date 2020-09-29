<template>

    <div>
        <ul class="flex flex-wrap justify-center">
            <li v-for="(skill, i) in this.skills"
                v-bind:key="i"
                v-on:click="activar($event)"
                :class="verificarClaseActiva(skill)"
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4">{{skill.nombre}}
            </li>
        </ul>

        <input type="hidden" name="skills" id="skills">
    </div>

</template>

<script>
    export default {
        props: ['skills', 'oldskills'],

        data: function() {
            return {
                habilidades: new Set()
            }
        },
        created: function() {
            if(this.oldskills) {
                const skillsArray = this.oldskills.split(',');
                skillsArray.forEach(skill => this.habilidades.add(skill));
            }
        },
        mounted: function() {
            document.querySelector('#skills').value = this.oldskills;
        },
        methods: {
            activar(e) {
                if(e.target.classList.contains('bg-teal-400')) {
                  e.target.classList.remove('bg-teal-400');
                  this.habilidades.delete(e.target.textContent.trim());
                } else {
                  e.target.classList.add('bg-teal-400');
                  this.habilidades.add(e.target.textContent.trim());
                }

                // Agregar elementos al input hidden para el insert
                const stringHabilidades = [...this.habilidades];
                document.querySelector('#skills').value = stringHabilidades;
            },

            verificarClaseActiva(skill) {
                return this.habilidades.has(skill.nombre) ? 'bg-teal-400' : '';
            }
        }
    }
</script>

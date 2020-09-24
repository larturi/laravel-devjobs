<template>
    <ul class="flex flex-wrap justify-center">
        <li v-for="(skill, i) in this.skills"
            v-bind:key="i"
            class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4">
              {{ skill.nombre }}
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['skills'],
        mounted() {
            console.log(this.skills);
        },
    }
</script>

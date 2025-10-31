<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({links: Array})
</script>

<template>
    <div class="flex gap-1">
        <div v-for="(link,index) in links" :key="index">
            <Link
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
                class="py-2 px-4 rounded-md"
                :class="{
          'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active
        }"
            />
            <span
                v-else
                v-html="link.label"
                class="py-2 px-4 rounded-md text-gray-400 cursor-not-allowed"
            ></span>
        </div>
    </div>
</template>

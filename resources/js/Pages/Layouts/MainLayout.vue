<script setup>
import {usePage} from "@inertiajs/vue3";
import {computed} from 'vue';
import {Link} from "@inertiajs/vue3";
import { route } from 'ziggy-js';

const page = usePage()
const flashMessage = computed(() => page.props.flash.success)
</script>

<template>
    <div>
        <Link :href="route('listing.index')">Listing</Link> |
        <Link :href="route('listing.create')">Create Listing</Link>
    </div>
    <div v-if="flashMessage" class="text-green-800">
        {{ flashMessage }}
    </div>
    <slot/>
</template>

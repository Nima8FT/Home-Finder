<script setup>
import {usePage} from "@inertiajs/vue3";
import {computed} from 'vue';
import {Link} from "@inertiajs/vue3";
import {route} from 'ziggy-js';

const page = usePage()
const flashMessage = computed(() => page.props.flash.success)
const user = computed(() => page.props.user)
</script>

<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listing</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold">
                    <Link :href="route('listing.index')">Home Finder</Link>
                </div>
                <div v-if="user" class="flex items-center gap-4">
                    <Link :href="route('realtor.listing.index')" class="text-sm text-gray-400">
                        {{user['name']}}
                    </Link>
                    <Link :href="route('listing.create')"
                          class="btn-primary">
                        + New Listing
                    </Link>
                    <div>
                        <Link class="cursor-pointer" :href="route('logout')" method="post">Logout</Link>
                    </div>
                </div>
                <div v-else>
                    <Link :href="route('login.form')">Login</Link> /
                    <Link :href="route('register.form')">Register</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <div v-if="flashMessage"
             class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2 ">
            {{ flashMessage }}
        </div>
        <slot/>
    </main>
</template>

<script setup>
import {Form, Link} from "@inertiajs/vue3";
import {route} from "ziggy-js";
import {ref} from "vue";

</script>

<template>
    <Form :action="route('listing.filter')" method="post">
        <div class="mb-8 mt-4 flex flex-wrap gap-4">
            <div class="flex flex-nowrap items-center">
                <input type="number" name="price-from" placeholder="Price From" class="input-filter rounded-r-none">
                <input type="text" name="price-to" placeholder="Price To" class="input-filter rounded-l-none">
            </div>
            <div class="flex flex-nowrap items-center">
                <select name="beds" class="input-filter rounded-r-none">
                    <option :value="0">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option>6+</option>
                </select>
                <select name="baths" class="input-filter rounded-l-none">
                    <option :value="0">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option>6+</option>
                </select>
            </div>
            <div class="flex flex-nowrap items-center">
                <input type="number" name="area-from" placeholder="Area From" class="input-filter rounded-r-none">
                <input type="number" name="area-to" placeholder="Area To" class="input-filter rounded-l-none">
            </div>
            <div class="flex items-center gap-4">
                <button type="submit" class="btn-normal">Filter</button>
                <Link :href="route('listing.index')" class="cursor-pointer">Clear</Link>
            </div>
        </div>
    </Form>

</template>

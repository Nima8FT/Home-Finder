<script setup>
import {Form} from '@inertiajs/vue3'
import {route} from "ziggy-js";
</script>

<template>
    <Form :action="route('listing.store')" method="post" #default="{errors}">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input name="beds" type="number"
                       class="input"/>
                <div v-if="errors.beds" class="input-error">
                    {{ errors.beds }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Baths</label>
                <input name="baths" type="number"
                       class="input"/>
                <div v-if="errors.baths" class="input-error">
                    {{ errors.baths }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Area</label>
                <input name="area" type="number"
                       class="input"/>
                <div v-if="errors.area" class="input-error">
                    {{ errors.area }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="label">City</label>
                <input name="city" type="text"
                       class="input"/>
                <div v-if="errors.city" class="input-error">
                    {{ errors.city }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Post Code</label>
                <input name="code" type="number"
                       class="input"/>
                <div v-if="errors.code" class="input-error">
                    {{ errors.code }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="label">Street</label>
                <input name="street" type="text"
                       class="input"/>
                <div v-if="errors.street" class="input-error">
                    {{ errors.street }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Street Nr</label>
                <input name="street_nr" type="number"
                       class="input"/>
                <div v-if="errors.street_nr" class="input-error">
                    {{ errors.street_nr }}
                </div>
            </div>

            <div class="col-span-6">
                <label class="label">Price</label>
                <input name="price" type="number"
                       class="input"/>
                <div v-if="errors.price" class="input-error">
                    {{ errors.price }}
                </div>
            </div>

            <div class="col-span-6">
                <button type="submit" class="btn-primary">
                    Create
                </button>
            </div>
        </div>
    </Form>
</template>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>

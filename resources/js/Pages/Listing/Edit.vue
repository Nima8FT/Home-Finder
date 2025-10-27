<script setup>
import {Form} from '@inertiajs/vue3'
import {route} from 'ziggy-js';

defineProps({
    listing: Object
})

</script>

<template>
    <Form :action="route('listing.update',listing.id)" method="put" #default="errors">
        <div>
            <div>
                <label>Beds</label>
                <input name="beds" type="number" :value=listing.beds />
                <div v-if="errors.beds">
                    {{ errors.beds }}
                </div>
            </div>

            <div>
                <label>Baths</label>
                <input name="baths" type="number" :value=listing.baths />
                <div v-if="errors.baths">
                    {{ errors.baths }}
                </div>
            </div>

            <div>
                <label>Area</label>
                <input name="area" type="number" :value=listing.area />
                <div v-if="errors.area">
                    {{ errors.area }}
                </div>
            </div>

            <div>
                <label>City</label>
                <input name="city" type="text" :value=listing.city />
                <div v-if="errors.city">
                    {{ errors.city }}
                </div>
            </div>

            <div>
                <label>Post Code</label>
                <input name="code" type="number" :value=listing.code />
                <div v-if="errors.code">
                    {{ errors.code }}
                </div>
            </div>

            <div>
                <label>Street</label>
                <input name="street" type="text" :value=listing.street />
                <div v-if="errors.street">
                    {{ errors.street }}
                </div>
            </div>

            <div>
                <label>Street Nr</label>
                <input name="street_nr" type="number" :value=listing.street_nr />
                <div v-if="errors.street_nr">
                    {{ errors.street_nr }}
                </div>
            </div>

            <div>
                <label>Price</label>
                <input name="price" type="number" :value=listing.price />
                <div v-if="errors.price">
                    {{ errors.price }}
                </div>
            </div>

            <div>
                <button type="submit">Edit</button>
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

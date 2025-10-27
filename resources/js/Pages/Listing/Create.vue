<script setup>
import {Form} from '@inertiajs/vue3'
import {route} from "ziggy-js";
</script>

<template>
    <Form :action="route('listing.store')" method="post" #default="{errors}">
        <div>
            <div>
                <label>Beds</label>
                <input name="beds" type="number"/>
                <div v-if="errors.beds">
                    {{ errors.beds }}
                </div>
            </div>

            <div>
                <label>Baths</label>
                <input name="baths" type="number"/>
                <div v-if="errors.baths">
                    {{ errors.baths }}
                </div>
            </div>

            <div>
                <label>Area</label>
                <input name="area" type="number"/>
                <div v-if="errors.area">
                    {{ errors.area }}
                </div>
            </div>

            <div>
                <label>City</label>
                <input name="city" type="text"/>
                <div v-if="errors.city">
                    {{ errors.city }}
                </div>
            </div>

            <div>
                <label>Post Code</label>
                <input name="code" type="number"/>
                <div v-if="errors.code">
                    {{ errors.code }}
                </div>
            </div>

            <div>
                <label>Street</label>
                <input name="street" type="text"/>
                <div v-if="errors.street">
                    {{ errors.street }}
                </div>
            </div>

            <div>
                <label>Street Nr</label>
                <input name="street_nr" type="number"/>
                <div v-if="errors.street_nr">
                    {{ errors.street_nr }}
                </div>
            </div>

            <div>
                <label>Price</label>
                <input name="price" type="number"/>
                <div v-if="errors.price">
                    {{ errors.price }}
                </div>
            </div>

            <div>
                <button type="submit">Create</button>
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

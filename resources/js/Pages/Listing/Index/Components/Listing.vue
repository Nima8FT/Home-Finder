<script setup>
import ListingAddress from "../../../Components/ListingAddress.vue";
import Box from "../../../Components/UI/Box.vue";
import Price from "../../../Components/Price.vue";
import {Link} from "@inertiajs/vue3";
import ListingSpace from "../../../Components/ListingSpace.vue";
import {route} from 'ziggy-js';
import {useMonthlyPayment} from "../../../Composable/useMonthlyPayment.js";

const props = defineProps({listing: Object})

const {monthlyPayment} = useMonthlyPayment(props.listing.price, 2.5, 25)
</script>

<template>
    <Box>
        <div>
            <Link :href="route('listing.show',props.listing.id)">
                <div class="flex items-center gap-2">
                    <Price :price="props.listing.price" class="text-2xl font-bold"/>
                    <div class="text-xs text-gray-500">
                        <Price :price="monthlyPayment"/>
                        pm
                    </div>
                </div>
                <ListingSpace :listing="props.listing" class="text-lg"/>
                <ListingAddress :listing="props.listing" class="text-gray-500 text-sm"/>
            </Link>
        </div>
        <div class="mt-2 flex justify-between">
            <Link :href="route('listing.edit',props.listing.id)" class="btn-normal bg-indigo-700">Edit</Link>
            <Link :href="route('listing.destroy',props.listing.id)" method="delete" as="button" class="cursor-pointer btn-normal bg-red-800">Delete</Link>
        </div>
    </Box>
</template>

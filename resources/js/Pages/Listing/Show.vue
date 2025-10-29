<script setup>
import ListingAddress from "../Components/ListingAddress.vue";
import Price from "../Components/Price.vue";
import ListingSpace from "../Components/ListingSpace.vue";
import Box from "../Components/UI/Box.vue";
import {ref, computed} from 'vue'
import {useMonthlyPayment } from "../Composable/useMonthlyPayment.js";

const props = defineProps({
    listing: Object
})

const intrestedRate = ref(2.5)
const duration = ref(25)

const {monthlyPayment ,totalPaid,totalInterest} = useMonthlyPayment(props.listing.price, intrestedRate, duration)
</script>

<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="col-span-12 md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">No Image</div>
        </Box>
        <div class="col-span-12 md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic Info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-500 text-sm"/>
            </Box>

            <Box>
                <template #header>
                    Monthly Payment
                </template>
                <div class="grid gap-4">
                    <div>
                        <label class="label opacity-70">Interest rate({{ intrestedRate }}%)</label>
                        <input type="range" min="0.1" max="30" step="0.1" v-model.number="intrestedRate"
                               class="w-full h-4 bg-gray-200 dark:bg-gray-600 rounded-lg appearance-none cursor-pointer">
                    </div>

                    <div>
                        <label class="label opacity-70">Duration ({{ duration }} years)</label>
                        <input type="range" min="3" max="35" step="1" v-model.number="duration"
                               class="w-full h-4 bg-gray-200 dark:bg-gray-600 rounded-lg appearance-none cursor-pointer">
                    </div>

                    <div class="text-gray-600 dark:text-gray-300">
                        <div class="text-gray-400">Your Monthly Payment</div>
                        <Price :price="monthlyPayment" class="text-3xl font-bold"/>
                    </div>


                    <div class="text-gray-500">
                        <div class="flex justify-between">
                            <div>Total Paid</div>
                            <div>
                                <Price :price="totalPaid" class="font-medium"/>
                            </div>
                        </div>
                    </div>

                    <div class="text-gray-500">
                        <div class="flex justify-between">
                            <div>Principel Paid</div>
                            <div>
                                <Price :price="props.listing.price" class="font-medium"/>
                            </div>
                        </div>
                    </div>

                    <div class="text-gray-500">
                        <div class="flex justify-between">
                            <div>Interest Paid</div>
                            <div>
                                <Price :price="totalInterest" class="font-medium"/>
                            </div>
                        </div>
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>

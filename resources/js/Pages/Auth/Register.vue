<script setup>
import {Form, Link} from '@inertiajs/vue3'
import {route} from "ziggy-js";
</script>

<template>
    <Form :action="route('register')" method="post" #default="{errors}">
        <div class="w-full md:w-1/3 m-auto grid gap-5">
            <div>
                <label class="label">Username</label>
                <input type="text" name="name" class="input">
                <div class="input-error mt-2" v-if="errors.name">{{ errors.name }}</div>
            </div>
            <div>
                <label class="label">Email</label>
                <input type="email" name="email" class="input">
                <div class="input-error mt-2" v-if="errors.email">{{ errors.email }}</div>
            </div>
            <div>
                <label class="label">Password</label>
                <input type="password" name="password" class="input">
                <div class="input-error mt-2" v-if="errors.password">{{ errors.password }}</div>
            </div>
            <div>
                <button type="submit" class="btn-primary w-full">Login</button>
            </div>
            <div class="text-center opacity-70">
                <Link :href="route('login.form')">I have account? Click here</Link>
            </div>
        </div>
    </Form>
</template>

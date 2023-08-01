<template>
    <v-card>
        <v-layout>
            <v-app-bar color="primary" >
                <v-toolbar-title>My files</v-toolbar-title>
                <router-link to="/marca">
                    <v-list-item title="Marca" value="Marca"></v-list-item>
                </router-link>
                <router-link to="/produto">
                    <v-list-item title="Produto" value="Produto"></v-list-item>
                </router-link>
            </v-app-bar>
            <v-main />
        </v-layout>
    </v-card>
</template>
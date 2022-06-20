<!-- <template>
   <div>
     Just an image
    <b-navbar variant="faded" type="light" class="w-100">
        <b-navbar-brand href="#">
        <img :src="'/images/logo.svg'" alt="Kitten">
        </b-navbar-brand>


            <b-navbar-toggle target="navbar-toggle-collapse">
            <template #default="{ expanded }">
                <b-icon v-if="expanded" icon="chevron-bar-up"></b-icon>
                <b-icon v-else icon="chevron-bar-down"></b-icon>
            </template>
            </b-navbar-toggle>

    </b-navbar>
    
    </div>
</template> -->

<template>
  <b-navbar toggleable type="light" class="w-100 container" fixed="top">
    <b-navbar-brand href="#">
        <img :src="'/images/logo.svg'" width="120" alt="logo">
    </b-navbar-brand>

    <b-navbar-toggle target="navbar-toggle-collapse">
      <img :src="'/images/nav.png'" alt="nav">
    </b-navbar-toggle>
    
  </b-navbar>
</template>

<script>

export default {
    name: "Header",
}
</script>
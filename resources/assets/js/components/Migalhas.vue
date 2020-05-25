<template>
  <ol class="breadcrumb">
    <li class="breadcrumb-item" v-bind:class="defineClass" v-for="item in lista">
      <a  v-if="item.url" v-bind:href="item.url">{{item.titulo}}</a>
      <span v-if="!item.url">{{item.titulo}}</span>
    </li>
  </ol>
</template>

<script>
export default {
  props: ["lista"],
  // mounted:function(){
  //     console.log(this.lista)
  // }
  computed: {
    defineClass: function() {
      if (this.url) {
        return "active";
      } else {
        return " ";
      }
    }
  }
};
</script>

<template>
  <div class="small-box bg-info" v-bind:style="defineCor">
    <div class="inner">
      <h3>{{qtd}}</h3>

      <p>{{titulo}}</p>
    </div>
    <div class="icon">
      <i v-bind:class="icone"></i>
    </div>
    <a v-bind:href="url" class="small-box-footer">
     Ver mais
      <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</template>

<script>
export default {
  props:['qtd','titulo','url', 'cor', 'icone'],
   computed: {
    defineCor: function() {
      return `background-color: ${this.cor} !important;`;
    }
  }
};
</script>

<style>
.bg-info {
  background-color: #17a2b8 !important;
}

.small-box {
  border-radius: 0.25rem;
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
  display: block;
  margin-bottom: 20px;
  position: relative;
  color: #fff
}

.small-box:hover {
    text-decoration: none;
}
.small-box:hover .icon {
    font-size: 95px;
}
.small-box>.small-box-footer:hover {
    color: #fff;
    background: rgba(0,0,0,0.15);
}

.small-box > .inner {
  padding: 10px;
}
.small-box h3,
.small-box p {
  z-index: 5;
}
.small-box h3 {
  /* font-size: 2.2rem; */
  font-weight: 700;
  margin: 0 0 10px 0;
  padding: 0;
  white-space: nowrap;
}
p {
  margin-top: 0;
  margin-bottom: 1rem;
}
.small-box p {
  font-size: 1rem;
}
.small-box .icon {
  -webkit-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  transition: all 0.3s linear;
  position: absolute;
  top: -10px;
  right: 10px;
  z-index: 0;
  font-size: 90px;
  color: rgba(0, 0, 0, 0.15);
}

.small-box .icon > i {
  font-size: 90px;
  position: absolute;
  right: 15px;
  top: 15px;
  transition: all 0.3s linear;
}

.small-box>.small-box-footer:hover {
    background: rgba(0,0,0,.15);
    color: #fff;
}
.small-box>.small-box-footer {
    background: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}
a{
  color: #3c8dbc;
}



</style>
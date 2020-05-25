<template>
  <div>
    <div class="form-inline">
      <a v-if="criar" v-bind:href="criar">Criar</a>
      <div class="form-group pull-right">
        <input type="search" class="form-control" placeholder="buscar" v-model="buscar" />
        <!-- {{buscar}} -->
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th
            style="cursor:pointer"
            v-on:click="ordenaColuna(index)"
            v-for="(titulo,index) in titulos"
          >{{titulo}}</th>

          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        <!-- o item e o valor real -->
        <!-- e o index e o numero do elemento -->
        <tr v-for="(item, index) in lista">
          <td v-for="i in item">{{i}}</td>

          <td v-if="detalhe || editar || deletar ">
            <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
              <!-- muda o valor do token -->
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="_token" v-bind:value="token" />
              <div v-html="index"></div>
              <span>{{index}}</span>
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
              <a v-if="editar" v-bind:href="editar">Editar</a> |
              <a v-if="deletar" v-on:click="executaForm(index)">Deletar</a>
            </form>
            <span v-if="!token">
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
              <a v-if="editar" v-bind:href="editar">Editar</a> |
              <a v-if="deletar" v-bind:href="deletar">Deletar</a>
            </span>
            <span v-if="token && !deletar">
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
              <a v-if="editar" v-bind:href="editar">Editar</a>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: [
    "titulos",
    "itens",
    "ordem",
    "ordemCol",
    "criar",
    "detalhe",
    "editar",
    "deletar",
    "token"
  ],
  data: function() {
    return {
      buscar: " ",
      //NÃO PODE ALTERAR O VALOR DE UM PROSP DIRETAMENTE
      ordemAux: this.ordem || "asc",
      ordemAuxCol: this.ordemCol ||  0
    };
  },
  methods: {
    // VAI USAR methods sempre que a ação vai ser determinada de um usuario
    executaForm: function(index) {
      console.log(index);
      document.getElementById(index).submit();
    },
    ordenaColuna: function(coluna) {
      this.ordemAuxCol = coluna;
      if (this.ordemAux.toLowerCase() == "asc") {
        this.ordemAux = "desc";
      } else {
        this.ordemAux = "asc";
      }
    }
  },
  computed: {
    //quando estiver carregando os itens vai ser usado methods computed
    lista: function() {
      let ordem = this.ordemAux || "asc";
      let ordemCol = this.ordemAuxCol || 0;
      ordem = ordem.toLowerCase();
      ordemCol = parseInt(ordemCol);

      if (ordem == "asc") {
        this.itens.sort((a, b) => {
          if (a[ordemCol] > b[ordemCol]) return 1;
          if (a[ordemCol] < b[ordemCol]) return -1;
          return 0;
        });
      } else {
        this.itens.sort((a, b) => {
          if (a[ordemCol] < b[ordemCol]) return 1;
          if (a[ordemCol] > b[ordemCol]) return -1;
          return 0;
        });
      }

      return this.itens.filter(res => {
        for (let k = 0; k < res.length; k++) {
          if (
            (res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0
          ) {
            return true;
          }
        }
        return false;
      });
    }
  }
};
</script>

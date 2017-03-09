<template>
  <div class="wrapper">
    <div class="top_logo">
      <image :src="logoUrl" class="logo"></image>
    </div>
    <text class="title">最新赛事</text>
    <div class="loading" v-if="loading">
      <image :src="lodingUrl" class="loding_gif"></image>
    </div>
  </div>
</template>

<style>
  .wrapper { align-items: center; margin:0px; padding:0px;border:none;}
  .top_logo { align-items: center; background:#000; width:100%; height:100px; margin:0px; padding:0px;}
  .logo { width: 500px; height: 100px;  margin:0px; padding:0px;border:none;}
  .loding_gif { width: 350px; height: 250px;  margin:0px; padding:0px;border:none;}
  .title { font-size: 28px; margin:10px auto; padding:0px;border:none; font-family:'黑体';}
</style>

<script>
  export default {
    data () {
        return {
            logoUrl: 'http://weixin.e-repaircar.com/app/title_logo.png',
            lodingUrl: 'http://weixin.e-repaircar.com/app/loding.gif',
            loading: true
        }
    },
    computed: {
        list () {
            var data = this.$store.lists[this.type];
            return data;
        }
    },
    methods: {
      getMatchData: function (e) {
          this.loading = true;
          this.$store.dispatch('FETCH_INDEX_DATA', {
              type: this.type
          }).then(() => {
              this.loading = false;
          })
      }
    },
    created(){
      this.getMatchData();
    }
  }
</script>

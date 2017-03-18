<template>
  <div class="wrapper">
    <div class="top_logo">
      <image :src="logoUrl" :style="logo_style"></image>
    </div>
    <text class="title">最新赛事</text>
    <div class="loading" v-if="loading">
      <image :src="lodingUrl" class="loding_gif"></image>
    </div>
  </div>
</template>

<style>
  .wrapper { align-items: center; margin:0px; padding:0px;border:none;background-color:#eee;}
  .top_logo { align-items: center; background:#000; margin:0px; padding:0px;flex-direction: row;}
  .loding_gif { width: 350px; height: 250px;  margin:0px; padding:0px;border:none;}
  .title { font-size: 30px; margin:10px auto; padding:20px;border:none; font-family:'黑体';text-align:left;border-bottom-width:2px;width:700;border-color:#888; }
</style>

<script>

  export default {
    data () {
        return {
            logoUrl: 'http://weixin.e-repaircar.com/app/title_logo.png',
            lodingUrl: 'http://weixin.e-repaircar.com/app/loding.gif',
            loading: true,
            logo_style: {
                width:'750px',
                height: '130px'
            }
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
              type: 'index'
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

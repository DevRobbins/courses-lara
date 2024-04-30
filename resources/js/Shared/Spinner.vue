<template>
    <div class="spinner-wrapper" :class="additionalClasses">
        <div class="lds-dual-ring"></div>
        <!-- <span>Loading...</span> -->
    </div>
</template>

<script>
export default {
    name: "Spinner", 
    props: {
        additionalClasses: String
    }
}
</script>
<style scoped>
.spinner-wrapper { display: flex; align-items: center; flex-direction: row; }
.lds-dual-ring {
    display: inline-block;
    width: 40px;
    height: 40px;
  }
  .lds-dual-ring:after {
    content: " ";
    display: block;
    width: 25px;
    height: 25px;
    margin: 8px;
    border-radius: 50%;
    border: 3px solid rgb(2 132 199);
    border-color: rgb(2 132 199) transparent rgb(2 132 199) transparent;
    animation: lds-dual-ring 1.2s linear infinite;
  }
  @keyframes lds-dual-ring {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  
</style>




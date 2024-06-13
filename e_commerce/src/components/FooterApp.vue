<template>
    <footer>
      <p>Edson Renan Baierle: <a href="https://github.com/edsonrenanbaierle" target="_blank">GitHub</a></p>
    </footer>
  </template>
  
  
  <script>
  export default {
    name: 'FooterApp'
    
  }
  </script>
  
  <style scoped>
    footer{
      height: 100px;
      background-color: #E53935;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  
    a {
      color: #ffc935;
      text-decoration: none;
      cursor: pointer;
    }
  
  
  </style>
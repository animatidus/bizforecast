<template>
    <header class="app-header">
      <h1 class="header-title">BizForecast</h1>
    </header>
  </template>

  <script>
  export default {
    name: 'AppHeader'
  };
  </script>

  <style scoped>
  .app-header {
    width: 100%;
    padding: 20px;
    background: linear-gradient(to right, #2196f3, #7fa3ab);
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-bottom: 4px solid #ffffff;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
  }

  .header-title {
    color: #ffffff;
    font-size: 2.5rem;
    margin: 0;
    font-weight: bold;
    letter-spacing: 2px;
    text-transform: uppercase;
  }
  </style>

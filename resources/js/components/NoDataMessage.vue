<template>
    <div class="no-data-message">
      <p class="no-data-text">Please pick a place</p>
    </div>
  </template>

  <script>
  export default {
    name: 'NoDataMessage'
  };
  </script>

  <style scoped>
  .no-data-message {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 300px;
    text-align: center;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .no-data-text {
    font-size: 1.5rem;
    color: #555;
    font-weight: bold;
    margin: 0;
  }
  </style>

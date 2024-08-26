<template>
    <div class="loading-message">
      <div class="spinner"></div>
      <p class="loading-text">Loading Weather Forecast....</p>
    </div>
  </template>

  <script>
  export default {
    name: 'LoadingMessage'
  };
  </script>

  <style scoped>
  .loading-message {
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

  .spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left: 4px solid #2196f3;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .loading-text {
    font-size: 1.5rem;
    color: #555;
    font-weight: bold;
    margin: 20px 0 0;
  }
  </style>

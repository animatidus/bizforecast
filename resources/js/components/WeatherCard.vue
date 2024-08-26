<template>
    <div class="weather-card">
      <p class="date-time">{{ formatDate(properties.dt * 1000) }}</p>
      <h3>{{ properties.name }}</h3>
      <p class="temperature">{{ properties.main.temp }}°C</p>
      <img :src="`http://openweathermap.org/img/wn/${properties.weather[0].icon}@4x.png`" :alt="properties.weather[0].description" />
      <p class="description">{{ properties.weather[0].description }}</p>
      <div class="details">
        <p>Humidity: {{ properties.main.humidity }}%</p>
        <p>Wind: {{ properties.wind.speed }} m/s</p>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: 'WeatherCard',
    props: {
      properties: Object
    },
    methods: {
      formatDate(timestamp) {
        return new Date(timestamp).toLocaleString(undefined, {
          hour: '2-digit',
          minute: '2-digit',
          second: '2-digit',
          hour12: true
        });
      }
    }
  };
  </script>

  <style scoped>
  .weather-card {
    min-width: 250px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .date-time {
    font-size: 1rem;
    color: #777;
    margin-bottom: 10px;
  }

  .weather-card h3,
  .weather-card h2 {
    margin-bottom: 10px;
    font-size: 1.5rem;
  }

  .temperature {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2196f3;
  }

  .weather-card img {
    width: 100px;
    margin: 10px 0;
  }

  .description {
    font-size: 1.2rem;
    text-transform: capitalize;
    color: #555;
  }

  .details {
    margin-top: 10px;
    font-size: 1rem;
    color: #777;
  }
  </style>

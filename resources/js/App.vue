<template>
    <div class="app-container">
      <AppHeader />
      <CustomSelect
        v-model="selectedAddress"
        :addresses="addresses"
        @fetch-coordinates="fetchCoordinates"
      />
      <div v-if="forecast">
        <div class="weather-container">
          <div v-for="(group, date) in groupedForecasts" :key="date" class="forecast-row">
            <h2 class="forecast-date">{{ date }}</h2>
            <div class="forecast-items">
              <WeatherCard v-for="(properties, index) in group" :key="index" :properties="properties" />
            </div>
          </div>
        </div>
      </div>
      <LoadingMessage v-else-if="loading" />
    </div>
  </template>

  <script>
  import axios from 'axios';
  import AppHeader from './components/AppHeader.vue';
  import CustomSelect from './components/CustomSelect.vue';
  import WeatherCard from './components/WeatherCard.vue';
  import LoadingMessage from './components/LoadingMessage.vue';

  export default {
    name: 'App',
    components: {
      AppHeader,
      CustomSelect,
      WeatherCard,
      LoadingMessage
    },
    data() {
      return {
        forecast: null,
        selectedAddress: '',
        coordinates: null,
        addresses: ['Tokyo', 'Yokohama', 'Kyoto', 'Osaka', 'Sapporo', 'Nagoya'],
        loading: false
      };
    },
    mounted() {
      if (this.addresses.length) {
        this.selectedAddress = this.addresses[0];
        this.fetchCoordinates();
      }
    },
    computed: {
      groupedForecasts() {
        const groups = {};
        if (this.forecast && this.forecast.list) {
          this.forecast.list.forEach((item) => {
            const date = new Date(item.dt * 1000).toLocaleDateString();
            if (!groups[date]) {
              groups[date] = [];
            }
            groups[date].push(item);
          });
        }
        return groups;
      }
    },
    methods: {
      async fetchCoordinates() {
        if (this.selectedAddress) {
          this.loading = true;
          try {
            const response = await axios.get('/get-coordinates', {
              params: { address: this.selectedAddress }
            });
            this.coordinates = response.data;
            const responseForecast = await axios.get('/weather/forecast', {
              params: {
                lat: this.coordinates.latitude,
                lon: this.coordinates.longitude
              }
            });
            this.forecast = responseForecast.data;
          } catch (error) {
            console.error('Error fetching data:', error);
          } finally {
            this.loading = false;
          }
        }
      }
    }
  };
  </script>

  <style scoped>
  .app-container {
  min-height: 100vh;
  background-color: #f0f4f8;
  font-family: Arial, sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  margin-top: 80px;
}

.weather-container {
  padding: 20px;
  background-color: #f0f4f8;
  width: 100%;
  max-width: 1600px;
}

.forecast-row {
  margin-bottom: 30px;
}

.forecast-date {
  font-size: 1.5rem;
  font-weight: bold;
  color: #2196f3;
  margin-bottom: 10px;
}

.forecast-items {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  padding: 10px;
}

.forecast-item {
  flex: 1 1 100%;
  max-width: 500px;
  box-sizing: border-box;
}

@media (max-width: 480px) {
  .forecast-date {
    font-size: 1rem;
  }

  .temperature {
    font-size: 1.5rem;
  }

  .weather-card img {
    width: 60px;
  }

  .weather-card h3 {
    font-size: 1rem;
  }
}
@media (max-width: 768px) {
  .forecast-date {
    font-size: 1.2rem;
  }

  .temperature {
    font-size: 2rem;
  }

  .weather-card img {
    width: 80px;
  }

  .weather-card h3 {
    font-size: 1.2rem;
  }
}
  </style>

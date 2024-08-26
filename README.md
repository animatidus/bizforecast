The Web App uses `Laravel Framework`, `Vue.js` with and `axios` to help from http request calls to the `OpenWeatherMap API` for Weather Forecast and `Geoapify API` for Place Information. <br>

## UI/UX Implementation

The CSS from the components provides a clean and visually appealing design that is easy to the eyes, The design is also responsive which ensures that the components look good on various devices, enchancing the application usability.
This also enhances the user experience by providing clear visual feedback of the weather forecast which displays in a `WeatherCard` component in a user-friendly format, making the information easy to read and interpret.


## Code Implementation

The implementation of code takes advantage of componentization, which are modular and focused on specific parts of the UI, making the code base easier to understand and manage.
The components of vue are reusable across different parts of the application, the modular design allows for easy updates and scalability as vue components can be modified or extended without affecting other parts of the application.

The code also follows the Single Responsibility Principle(SRP). `ForecastController` handles the weather forecast data retrieval, while `GeoController` manages geocoding requests, which makes it easier to maintain and test each 
component individually. The `WeatherService` and `GeoapifyService` are separated from the controller to ensures that the controllers are focused on handling request and responses, while the services manages the external API communication and logic.

The code are configured where the environment variables handles the sensitive data like API keys and base URLS. In this way, it enhances the security by keeping the sensitive information out of the source code and simplifies the configuration management
across different environments.

## My Application Setup

I've used `Laravel Herd` for an easy setup of the development environment. 

- Installed npm node_modules
- Installed vite plugin for vue
- Installed axios.

This repository is not built for production,
to test, please run `npm run dev` on the terminal.

`.env` and `node_modules` are included in this repository.

<template>
    <div class="select-container">
      <select
        class="custom-select"
        :value="modelValue"
        @change="handleChange"
      >
        <option disabled value="">Select an address</option>
        <option v-for="address in addresses" :key="address" :value="address">
          {{ address }}
        </option>
      </select>
    </div>
  </template>

  <script>
  export default {
    name: 'CustomSelect',
    props: {
      modelValue: String,
      addresses: Array
    },
    emits: ['update:modelValue', 'fetch-coordinates'],
    methods: {
      handleChange(event) {
        this.$emit('update:modelValue', event.target.value);
        this.$emit('fetch-coordinates');
      }
    }
  };
  </script>

  <style scoped>
  .select-container {
  width: 100%;
  max-width: 400px;
  margin: 20px auto;
}

.custom-select {
  width: 100%;
  padding: 12px 16px;
  border-radius: 8px;
  border: 1px solid #ddd;
  background-color: #fff;
  color: #333;
  font-size: 16px;
  appearance: none;
  cursor: pointer;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  position: relative;
}

.custom-select:focus {
  border-color: #2196f3;
  box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.3);
  outline: none;
}

.custom-select::after {
  content: '▼';
  font-size: 12px;
  color: #333;
  position: absolute;
  top: 50%;
  right: 16px;
  transform: translateY(-50%);
  pointer-events: none;
}
  </style>

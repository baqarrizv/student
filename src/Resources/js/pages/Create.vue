<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <Link href="/students" class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-medium text-gray-900">
              Students
            </Link>
            <Link href="/blogs" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
              Blogs
            </Link>
          </div>
        </div>
      </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Add New Student</h1>

        <form @submit.prevent="submit" class="bg-white shadow rounded-lg p-6">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
              Name
            </label>
            <input
              id="name"
              v-model="form.name"
              type="text"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Enter student name"
            />
            <p v-if="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name }}</p>
          </div>

          <div class="mb-4">
            <label for="father_name" class="block text-sm font-medium text-gray-700 mb-2">
              Father Name
            </label>
            <input
              id="father_name"
              v-model="form.father_name"
              type="text"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Enter father name"
            />
            <p v-if="errors.father_name" class="mt-1 text-sm text-red-600">{{ errors.father_name }}</p>
          </div>

          <div class="mb-4">
            <label for="age" class="block text-sm font-medium text-gray-700 mb-2">
              Age
            </label>
            <input
              id="age"
              v-model.number="form.age"
              type="number"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Enter age"
              min="1"
              max="150"
            />
            <p v-if="errors.age" class="mt-1 text-sm text-red-600">{{ errors.age }}</p>
          </div>

          <div class="flex gap-3">
            <button
              type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
            >
              Create Student
            </button>
            <Link
              href="/students"
              class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition"
            >
              Cancel
            </Link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  errors: {
    type: Object,
    default: () => ({}),
  },
});

const form = {
  name: '',
  father_name: '',
  age: '',
};

const submit = () => {
  router.post('/students', form);
};
</script>

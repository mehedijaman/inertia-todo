<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, useForm} from '@inertiajs/vue3';
import ToastNotification from '@/Components/ToastNotification.vue';
import toast from '@/Stores/toast';

const page = usePage();
const form = useForm({
    'todo': null,
});

function submit(){
    form.post('/todo', {
        preserveScroll:true,
        onSuccess: () => {
            toast.add({
                message:'Task Added Successfully'
            });
        }
    });
}
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <ToastNotification></ToastNotification>
        <div class="min-h-screen max-w-screen bg-gradient-to-bl from-violet-300 to-sky-300 flex flex-col gap-2 p-10 items-center">
            <div class="max-w-xl w-full bg-white p-5 rounded-md shadow-lg">

                <form @submit.prevent="submit()" class="grid grid-cols-12 gap-2">
                    <div class="col-span-9">
                        <input v-model="form.todo" class="w-full p-2 border focus:outline-none focus:border-blue-200 focus:shadow-lg" type="text" name="task" placeholder="Enter new Task Description">
                    </div>
                    <div class="col-span-3 flex items-center">
                        <button class="w-full py-2 bg-blue-400 text-white rounded-md font-medium hover:bg-sky-500  hover:cursor-pointer flex justify-center" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 font-bold">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                            </svg>
                            <span>Add</span>
                        </button>
                    </div>
                </form>


                <!-- <form action="/update/" method="POST" enctype="multipart/form-data" class="grid grid-cols-12">

                    <div class="col-span-9">
                        <input class="w-full p-2 border focus:outline-none focus:border-green-200 focus:shadow-lg" type="text" name="task" placeholder="Enter new Task Description" value="{{ $EditTodo->task }}">
                    </div>
                    <div class="col-span-3 flex items-center">
                        <input class="w-full py-2 bg-sky-400 text-white rounded-md font-medium hover:bg-sky-500  hover:cursor-pointer" type="submit" name="submit" value="Update Task">
                    </div>
                </form> -->
            </div>

            <div class="max-w-xl w-full bg-white p-5 rounded-md shadow-lg">
                <table class="w-full table-auto border-collapse border-slate-950 hover:border-blue-950">
                    <thead>
                        <tr class="bg-blue-50">
                            <th class="p-2 border border-slate-300">Description</th>
                            <th class="p-2 border border-slate-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="p-2 font-medium text-center bg-blue-400 text-white">Pending</td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-center p-5">All done !</td>
                        </tr>

                        <tr>
                            <td class="p-2 border border-slate-300">
                                <div class="flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-400">
                                        <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    <span></span>
                                </div>
                            </td>
                            <td class="p-2 border border-slate-300 flex gap-1 justify-end">
                                <form action="/done/{{  }}" method="POST" enctype="multipart/form-data">

                                    <button title="Mark as Done" type="submit" name="submit" value="Undo" class="px-2 py-1 bg-sky-500 text-white rounded-md hover:bg-gray-600 font-semibold hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                                <form action="/edit/" method="POST" enctype="multipart/form-data">

                                    <button title="Edit" type="submit" name="submit" value="Edit" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                        </svg>
                                    </button>
                                </form>

                                <form action="/destroy/" method="POST" enctype="multipart/form-data">

                                    <button title="Delete" type="submit" name="submit" value="Delete" class="px-2 py-1 bg-red-500 text-white rounded-md font-semibold hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="p-2 font-medium bg-gray-400 text-white text-center">
                                Completed
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-center p-5">Nothing done yet.</td>
                        </tr>

                        <tr>
                            <td class="p-2 border border-slate-300">
                                <div class="flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-gray-400">
                                        <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="line-through"></span>
                                </div>
                            </td>
                            <td class="p-2 border border-slate-300 flex gap-1 justify-end">
                                <form action="/undo/" method="POST" enctype="multipart/form-data">

                                    <button title="Undo" type="submit" name="submit" value="Undo" class="px-2 py-1 bg-gray-500 text-white rounded-md hover:bg-gray-600 font-semibold hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                                <form action="/edit/" method="POST" enctype="multipart/form-data">

                                    <button title="Edit" type="submit" name="submit" value="Edit" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                        </svg>
                                    </button>
                                </form>

                                <form action="/destroy/" method="POST" enctype="multipart/form-data">

                                    <button title="Delete" type="submit" name="submit" value="Delete" class="px-2 py-1 bg-red-500 text-white rounded-md font-semibold hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <section class="">
                        <div class="px-6 h-full text-gray-800">
                            <div
                                class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                                <div
                                    class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                        class="w-full" alt="Sample image" />
                                </div>
                                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                                    <form method="post" action="{{ route('upload.excel') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-6">
                                            <div class="mb-3 w-96">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Upload Excel File</label>
                                                <input name="excel"
                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                    aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                    id="file_input_help">xlsx, xls or xml (max. 10MB)</p>
                                                @if ($errors->any())
                                                    <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                                        role="alert">
                                                        <svg aria-hidden="true"
                                                            class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Danger</span>
                                                        <div>
                                                            <span class="font-medium">Ensure that these requirements are
                                                                met:</span>
                                                            <ul class="mt-1.5 ml-4 list-disc list-inside">
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (session('success'))
                                                    <div id="alert-additional-content-3"
                                                        class="p-4 mb-4 text-green-700 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                                        role="alert">
                                                        <div class="flex items-center">
                                                            <svg aria-hidden="true" class="w-5 h-5 mr-2"
                                                                fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Success</span>
                                                            <h3 class="text-lg font-medium">{{ session('success') }}
                                                            </h3>
                                                        </div>
                                                        <div class="mt-2 mb-4 text-sm">
                                                            Please click here to download
                                                        </div>
                                                        <div class="flex">
                                                            <a href="{{ route('download.excel') }}"
                                                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                                    <path fill-rule="evenodd"
                                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                Download Now
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center lg:text-left">
                                            <button type="submit"
                                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Upload</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                                    <table class="text-sm text-left text-gray-500 dark:text-gray-400 mb-4">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    File Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Operations
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($files as $file)
                                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ str_replace('{*}', $file->batch, EXCEL_NAME) }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $file->created_at }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{ route('download.excel', $file->batch) }}"
                                                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                            <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4"
                                                                fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                                <path fill-rule="evenodd"
                                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            Download Now
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                    <th colspan="3">
                                                        No Uploaded Files Yet.
                                                    </th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

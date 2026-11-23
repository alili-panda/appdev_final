@include('partials.header')

<div class="bg-slate-100 font-sans">

<div class="flex min-h-screen">
@include('partials.navClient')

    <!-- MAIN CONTENT -->
    <main class="flex-1 min-w-0">

        <!-- HEADER -->
        <header class="bg-white shadow-sm px-8 py-5 flex justify-between items-center">

            <div>
                <h2 class="text-xl font-bold text-blue-950">
                    Client Dashboard
                </h2>

                <p class="text-sm text-slate-500">
                    Monitor your case progress and submit required documents.
                </p>
            </div>

            <!-- USER PROFILE -->
            <div class="flex items-center gap-3">

                <div class="text-right">
                    <p class="font-semibold text-slate-800">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-slate-500">
                        Client
                    </p>
                </div>

                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-900
                            flex items-center justify-center font-bold">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

            </div>

        </header>


        <!-- DASHBOARD BODY -->
        <div class="p-8">

            <!-- WELCOME BANNER -->
            <div class="bg-gradient-to-r from-blue-950 to-blue-800
                        rounded-2xl p-7 text-white mb-8">

                <h2 class="text-2xl font-bold mb-2">
                    Welcome, {{ Auth::user()->name }}!
                </h2>

                <p class="text-blue-100 text-sm">
                    Stay informed about your case progress through MSWDO CARE.
                    You can also submit supporting documents when requested
                    by your assigned social worker.
                </p>

            </div>


            <!-- CASE STATUS SUMMARY -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-200">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500 mb-2">
                                Current Case Status
                            </p>

                            <h3 class="text-xl font-bold text-yellow-600">
                                Pending
                            </h3>

                            <p class="text-xs text-slate-400 mt-2">
                                Your latest case status
                            </p>
                        </div>

                        <div class="w-12 h-12 bg-yellow-100 rounded-xl
                                    flex items-center justify-center text-yellow-600 text-xl">
                            ◷
                        </div>

                    </div>

                </div>


                <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-200">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500 mb-2">
                                Document Submission
                            </p>

                            <h3 class="text-xl font-bold text-blue-950">
                                No Pending Upload
                            </h3>

                            <p class="text-xs text-slate-400 mt-2">
                                Document requirements
                            </p>
                        </div>

                        <div class="w-12 h-12 bg-blue-100 rounded-xl
                                    flex items-center justify-center text-blue-700 text-xl">
                            ▤
                        </div>

                    </div>

                </div>

            </div>


            <!-- MY CASE STATUS -->
            <section id="case-status"
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-8">

                <div class="flex items-center justify-between mb-5">

                    <div>
                        <h3 class="text-lg font-bold text-blue-950">
                            My Case Status
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            View the latest information about your case.
                        </p>
                    </div>

                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                 bg-yellow-100 text-yellow-700">
                        Pending
                    </span>

                </div>


                <!-- CASE INFORMATION -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">

                    <div class="bg-slate-50 rounded-lg p-4">
                        <p class="text-xs text-slate-500 mb-1">
                            Case Reference Number
                        </p>

                        <p class="font-semibold text-slate-800">
                            Not yet available
                        </p>
                    </div>

                    <div class="bg-slate-50 rounded-lg p-4">
                        <p class="text-xs text-slate-500 mb-1">
                            Date Received
                        </p>

                        <p class="font-semibold text-slate-800">
                            Not yet available
                        </p>
                    </div>

                </div>


                <!-- CASE PROGRESS -->
                <h4 class="font-semibold text-slate-700 mb-4">
                    Case Progress
                </h4>

                <div class="border-l-2 border-blue-200 ml-2 pl-6 space-y-6">

                    <div class="relative">

                        <span class="absolute -left-[33px] w-4 h-4
                                     bg-blue-700 rounded-full border-4 border-white">
                        </span>

                        <p class="font-semibold text-slate-800">
                            Case Received
                        </p>

                        <p class="text-sm text-slate-500">
                            Your case has been received by MSWDO.
                        </p>

                    </div>


                    <div class="relative">

                        <span class="absolute -left-[33px] w-4 h-4
                                     bg-slate-300 rounded-full border-4 border-white">
                        </span>

                        <p class="font-semibold text-slate-700">
                            Case Assessment
                        </p>

                        <p class="text-sm text-slate-500">
                            Waiting for case assessment update.
                        </p>

                    </div>


                    <div class="relative">

                        <span class="absolute -left-[33px] w-4 h-4
                                     bg-slate-300 rounded-full border-4 border-white">
                        </span>

                        <p class="font-semibold text-slate-700">
                            Case Processing
                        </p>

                        <p class="text-sm text-slate-500">
                            Waiting for processing update.
                        </p>

                    </div>


                    <div class="relative">

                        <span class="absolute -left-[33px] w-4 h-4
                                     bg-slate-300 rounded-full border-4 border-white">
                        </span>

                        <p class="font-semibold text-slate-700">
                            Case Completed
                        </p>

                        <p class="text-sm text-slate-500">
                            Your case is not yet completed.
                        </p>

                    </div>

                </div>

            </section>


            <!-- DOCUMENT UPLOAD -->
            <section id="documents"
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

                <h3 class="text-lg font-bold text-blue-950 mb-2">
                    Upload Required Documents
                </h3>

                <p class="text-sm text-slate-500 mb-5">
                    Upload supporting documents only when requested by
                    your assigned MSWDO social worker.
                </p>


                <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 mb-5">

                    <p class="text-sm text-blue-900 font-semibold">
                        Document Submission Reminder
                    </p>

                    <p class="text-xs text-blue-800 mt-1">
                        Please ensure that the uploaded documents are clear,
                        complete, and related to your case.
                    </p>

                </div>


                <form action="#" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="border-2 border-dashed border-slate-300
                                rounded-xl p-8 text-center">

                        <div class="text-4xl mb-3 text-blue-700">
                            ⇧
                        </div>

                        <p class="font-semibold text-slate-700 mb-2">
                            Select a document to upload
                        </p>

                        <p class="text-xs text-slate-500 mb-5">
                            Accepted formats: PDF, JPG, JPEG, PNG
                        </p>

                        <input
                            type="file"
                            name="document"
                            accept=".pdf,.jpg,.jpeg,.png"
                            class="block w-full max-w-md mx-auto text-sm text-slate-500"
                        >

                    </div>


                    <button type="submit"
                        class="mt-5 bg-blue-950 hover:bg-blue-800
                               text-white px-6 py-3 rounded-lg
                               text-sm font-semibold transition">

                        Upload Document

                    </button>

                </form>

            </section>

        </div>

    </main>

</div>

</div>
@include('partials.footer')

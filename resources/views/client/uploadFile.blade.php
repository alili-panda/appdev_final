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
                   Documents
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

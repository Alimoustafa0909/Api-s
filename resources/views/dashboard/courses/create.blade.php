@extends('dashboard.partials.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Courses</h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->


            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    @if( count($errors) > 0 )
        @include('dashboard.partials.error_alert')
    @endif

    <div class="card">
        <!-- begin :: Card body -->
        <div class="card-body p-0">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.courses.store') }}" class="form" method="post"
                  enctype="multipart/form-data">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark"> Add Courses</h3>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="px-8 py-4">


                    <!-- begin :: Row -->
                    <div class="row mb-8">


                        <!-- begin :: Column -->
                        <div class="col-md-12 text-center mb-5 fv-row">

                            <!--begin::Image input-->
                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                 style="background-image: url('{{ asset('dashboard-assets/media/avatars/blank.png') }}')">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="change"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                            </div>
                            <!--end::Image input-->


                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->


                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">Name</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_inp" name="title" placeholder="example"
                                       value="{{ old('title') }}">
                                <label for="name_inp">Enter Title</label>
                            </div>
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>

                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">description</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_inp" name="description" placeholder="example"
                                       value="{{ old('description') }}">
                                <label for="name_inp">Enter description</label>
                            </div>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row" id="children-categories-container">
                            <label class="fs-5 fw-bold mb-2">duration</label>
                            <select class="form-select" name="duration" data-control="select2" multiple
                                    data-placeholder="Select an option">
                                <option value="3">3 weeks</option>
                                <option value="6">6 weeks</option>
                                <option value="9">9 weeks</option>
                                <option value="12">12 weeks</option>
                            </select>

                            @error('duration')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row" id="children-categories-container">
                            <label class="fs-5 fw-bold mb-2">Stock_status</label>
                            <select class="form-select" name="lectures" data-control="select2" multiple
                                    data-placeholder="Select an option">
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>

                            @error('lectures')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row" id="children-categories-container">
                            <label class="fs-5 fw-bold mb-2">quizzes</label>
                            <select class="form-select" name="quizzes" data-control="select2" multiple
                                    data-placeholder="Select an option">
                                <option value="1">1 quizzes</option>
                                <option value="2">2 quizzes</option>
                                <option value="3">3 quizzes</option>
                                <option value="4">4 quizzes</option>
                                <option value="5">5 quizzes</option>
                                <option value="6">6 quizzes</option>
                                <option value="7">7 quizzes</option>
                                <option value="8">8 quizzes</option>
                                <option value="9">9 quizzes</option>
                                <option value="10">10 quizzes</option>
                                <option value="11">11 quizzes</option>
                                <option value="12">12 quizzes</option>
                            </select>

                            @error('quizzes')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>




                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">people_enrolled</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="people_enrolled"
                                       placeholder="example" value="{{ old('people_enrolled') }}">
                                <label for="people_enrolled">people_enrolled</label>
                            </div>
                            @error('people_enrolled')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">Price</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="price" name="price"
                                       placeholder="example" value="{{ old('price') }}">
                                <label for="price">Price</label>
                            </div>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->

                        <!-- end   :: Column -->

                        <!-- begin :: Column -->

                        <!-- end   :: Column -->
                        <!-- begin :: Column -->

                        <!-- end   :: Column -->
                        <div class="col-md-6 fv-row" id="children-categories-container">

                            <label class="fs-5 fw-bold mb-2">teacher_id</label>
                            <select class="form-select" data-control="select2" name="teacher_id" multiple
                                    data-placeholder="Select an option">
                                <option value=""></option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach

                            </select>
                            @error('teacher_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end   :: Row -->

                </div>
                <!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer p-8 text-end">

                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary">

                        <span class="indicator-label">save</span>

                    </button>
                    <!-- end   :: Submit btn -->

                </div>
                <!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection

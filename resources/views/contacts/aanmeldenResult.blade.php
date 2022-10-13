@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                      Aanmeldingen
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                          <a class="link-fx" href="javascript:void(0)">Lifestyledag</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                          Aanmeldingen
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <!--
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Dynamic Table <small>Export Buttons</small>
                </h3>
            </div>
            -->
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                    <thead>
                    <tr>
                        <th>Activiteit</th>
                        <th>Beschrijving</th>
                        <th>Aantal rondes</th>
                        <th>Max aantal studenten</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($aanmeldingen as $aanmelding)
                          <tr>
                              <td class="">{{ $aanmelding->activiteit }}</td>
                              <td class="">{{ $aanmelding->beschrijving }}</td>
                              <td class="">{{ $aanmelding->ronde }}</td>
                              <td class="">{{ $aanmelding->capaciteit }}</td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
